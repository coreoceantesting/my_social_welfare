<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreWomenRequest;
use App\Http\Requests\User\UpdateWomenRequest;
use App\Models\WomenScheme;
use App\Models\WomenSchemeDocuments_model;
use App\Models\Ward;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WomenSewingSchemeController extends Controller
{

    public function list()
    {
        $women = WomenScheme::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.women_scheme.application_list')->with(['women' => $women]);
    }

    public function index()
    {
        $scheme_id = session('scheme_id');
        $women = WomenScheme::where('created_by', Auth::user()->id)->latest()->first();
        if (!empty($women)) {
            return redirect('women_scheme_application')->with('warning', 'You Have already apply for this form');
        }
        $wards = Ward::latest()->get();

        $document = DB::table('document_type_msts')
            ->where('scheme_id', $scheme_id)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('users.women_scheme.women_scheme')->with(['women' => $women, 'wards' => $wards, 'document' => $document]);
    }

    public function store(StoreWomenRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('women_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('women_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $unique_id = "WOM-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $women = WomenScheme::create(Arr::only($input, WomenScheme::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('women_scheme_file/', $imageName);
                    WomenSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "women_id" => $women->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Women Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Women Scheme');
        }
    }

    public function edit(WomenScheme $women_scheme)
    {

        $wards = Ward::latest()->get();
        // $women_scheme->load('wardss')->first();
        $women_scheme->load(['wardss', 'womenSchemeDocuments.document']);

        if ($women_scheme) {
            $wardHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach ($wards as $ward) :
                $is_select = $ward->id == $women_scheme->ward_id ? "selected" : "";
                $wardHtml .= '<option value="' . $ward->id . '" ' . $is_select . '>' . $ward->name . '</option>';
            endforeach;
            $wardHtml .= '</span>';

            $response = [
                'result' => 1,
                'women_scheme' => $women_scheme,
                'wardHtml' => $wardHtml,
                'documents' => $women_scheme->womenSchemeDocuments
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateWomenRequest $request, WomenScheme $women_scheme)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if (
                $women_scheme['hod_status'] == 1 && $women_scheme['ac_status'] == 1 && $women_scheme['amc_status'] == 1 && $women_scheme['dmc_status'] == 2
                || $women_scheme['hod_status'] == 1 && $women_scheme['ac_status'] == 1 && $women_scheme['amc_status'] == 2 && $women_scheme['dmc_status'] == 1
                || $women_scheme['hod_status'] == 1 && $women_scheme['ac_status'] == 2 && $women_scheme['amc_status'] == 1 && $women_scheme['dmc_status'] == 1
                || $women_scheme['hod_status'] == 2 && $women_scheme['ac_status'] == 1 && $women_scheme['amc_status'] == 1 && $women_scheme['dmc_status'] == 1
                || $women_scheme['hod_status'] == 2 && $women_scheme['ac_status'] == 2 && $women_scheme['amc_status'] == 2 && $women_scheme['dmc_status'] == 2
                || $women_scheme['hod_status'] == 1 && $women_scheme['ac_status'] == 1 && $women_scheme['amc_status'] == 1 && $women_scheme['dmc_status'] == 2
                || $women_scheme['hod_status'] == 1 && $women_scheme['ac_status'] == 2 && $women_scheme['amc_status'] == 0 && $women_scheme['dmc_status'] == 0
                || $women_scheme['hod_status'] == 2 && $women_scheme['ac_status'] == 0 && $women_scheme['amc_status'] == 0 && $women_scheme['dmc_status'] == 0
                || $women_scheme['hod_status'] == 1 && $women_scheme['ac_status'] == 1 && $women_scheme['amc_status'] == 2 && $women_scheme['dmc_status'] == 0
            ) {
                $women_scheme['hod_status'] = 0;
                $women_scheme['ac_status']  = 0;
                $women_scheme['amc_status'] = 0;
                $women_scheme['dmc_status'] = 0;
            }

            // update uploaded file
            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('women_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('women_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $women_scheme->update(Arr::only($input, WomenScheme::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Women Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Women Scheme');
        }
    }

    public function destroy(WomenScheme $women_scheme)
    {
        try {
            DB::beginTransaction();
            $women_scheme->womenSchemeDocuments()->delete();
            $women_scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Women Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Women Scheme');
        }
    }


    public function womenSchemeApplicationView($id)
    {

        $data =  DB::table('trans_women_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();


        $document = DB::table('trans_women_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.women_id', $data->id)
            ->get();

        return view('users.women_scheme.view', compact('data', 'document'));
    }

    public function generateCertificate($id)
    {

        $data =  DB::table('trans_women_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.women_scheme.generate_certificate', compact('data'));
    }


    public function womenSchemeCertificate($id)
    {

        $data =  DB::table('trans_women_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();


        $document = DB::table('trans_women_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.women_id', $data->id)
            ->get();

        return view('users.women_scheme.women_scheme_certificate_view', compact('data', 'document'));
    }
}