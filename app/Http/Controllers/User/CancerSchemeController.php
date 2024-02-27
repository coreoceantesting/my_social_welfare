<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreCancerRequest;
use App\Http\Requests\User\UpdateCancerRequest;
use App\Models\CancerScheme;
use App\Models\CancerSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CancerSchemeController extends Controller
{

    public function list()
    {
        $cancer = CancerScheme::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.cancer_scheme.application_list')->with(['cancer' => $cancer]);
    }

    public function index()
    {
        $cancer = CancerScheme::where('created_by', Auth::user()->id)->latest()->first();
        if (!empty($cancer)) {
            return redirect('cancer_scheme_application')->with('warning', 'You Have already apply for this form');
        }
        $document = DB::table('document_type_msts')
            ->where('scheme_id', 7)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('users.cancer_scheme.cancer_scheme')->with(['document' => $document]);
    }

    public function store(StoreCancerRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('cancer_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('cancer_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $unique_id = "CAN-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $cancer = CancerScheme::create(Arr::only($input, CancerScheme::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('cancer_scheme_file/', $imageName);
                    CancerSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "cancer_id" => $cancer->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Cancer Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Cancer Scheme');
        }
    }

    public function edit(CancerScheme $cancer_scheme)
    {

        $cancer_scheme->load(['cancerSchemeDocuments.document']);

        if ($cancer_scheme) {
            $response = [
                'result' => 1,
                'cancer_scheme' => $cancer_scheme,
                'documents' => $cancer_scheme->cancerSchemeDocuments,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateCancerRequest $request, CancerScheme $cancer_scheme)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $cancer_scheme->update(Arr::only($input, CancerScheme::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Cancer Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Cancer Scheme');
        }
    }


    public function destroy(CancerScheme $cancer_scheme)
    {
        try {
            DB::beginTransaction();
            $cancer_scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Cancer Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Cancer Scheme');
        }
    }


    public function generateCertificate($id)
    {

        $data =  DB::table('trans_cancer_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.cancer_scheme.generate_certificate', compact('data'));
    }

    public function cancerSchemeApplicationView($id)
    {

        $data =  DB::table('trans_cancer_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_cancer_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.cancer_id', $data->id)
            ->get();

        return view('users.cancer_scheme.view', compact('data', 'document'));
    }

    public function cancerSchemeCertificate($id)
    {

        $data =  DB::table('trans_cancer_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_cancer_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.cancer_id', $data->id)
            ->get();

        $scheme = DB::table('mst_scheme')->select('*')->where('id', 7)->whereNull('deleted_at')->first();

        return view('users.cancer_scheme.cancer_scheme_certificate_view', compact('data', 'document', 'scheme'));
    }
}
