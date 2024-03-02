<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreMarriageRequest;
use App\Http\Requests\User\UpdateMarriageRequest;
use App\Models\MarriageScheme;
use App\Models\Ward;
use App\Models\MarriageSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\HayatFormModel;


class MarriageSchemeController extends Controller
{
    public function list()
    {
        $marriage = MarriageScheme::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.marriage_scheme.application_list')->with(['marriage' => $marriage]);
    }

    public function index()
    {
        $scheme_id = session('scheme_id');
        $userCategory = Auth::user()->category;
        if ($userCategory == 1 || $userCategory == 2) {
            $data = HayatFormModel::where('user_id', Auth::user()->id)
                ->latest()
                ->first();

            if (empty($data)) {
                return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Fill the Hayatika form before proceeding.');
            } elseif ($data->sign_uploaded_live_certificate == "") {
                return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Your Application status is still Pending');
            } else {
                $marriage = MarriageScheme::where('created_by', Auth::user()->id)->latest()->first();
                if (!empty($marriage)) {
                    return redirect('marriage_scheme_application')->with('warning', 'You Have already apply for this form');
                }
                $wards = Ward::latest()->get();
                $document = DB::table('document_type_msts')
                    ->where('scheme_id', $scheme_id)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->get();
                return view('users.marriage_scheme.marriage_scheme')->with(['wards' => $wards, 'document' => $document]);
            }
        } else {
            $marriage = MarriageScheme::where('created_by', Auth::user()->id)->latest()->first();
            if (!empty($marriage)) {
                return redirect('marriage_scheme_application')->with('warning', 'You Have already apply for this form');
            }
            $wards = Ward::latest()->get();
            $document = DB::table('document_type_msts')
                ->where('scheme_id', 4)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->get();
            return view('users.marriage_scheme.marriage_scheme')->with(['wards' => $wards, 'document' => $document]);
        }
    }

    public function store(StoreMarriageRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('marriage_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('marriage_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }
            $unique_id = "MAR-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $marriage = MarriageScheme::create(Arr::only($input, MarriageScheme::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('marriage_scheme_file/', $imageName);
                    MarriageSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "marriage_id" => $marriage->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Marriage Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Marriage Scheme');
        }
    }

    public function edit(MarriageScheme $marriage_scheme)
    {
        $wards = Ward::latest()->get();
        // $marriage_scheme->load('wardss')->first();
        $marriage_scheme->load(['wardss', 'marriageSchemeDocuments.document']);


        if ($marriage_scheme) {
            $wardHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach ($wards as $ward) :
                $is_select = $ward->id == $marriage_scheme->ward_id ? "selected" : "";
                $wardHtml .= '<option value="' . $ward->id . '" ' . $is_select . '>' . $ward->name . '</option>';
            endforeach;
            $wardHtml .= '</span>';

            $response = [
                'result' => 1,
                'marriage_scheme' => $marriage_scheme,
                'wardHtml' => $wardHtml,
                'documents' => $marriage_scheme->marriageSchemeDocuments,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateMarriageRequest $request, MarriageScheme $marriage_scheme)
    {

        try {
            DB::beginTransaction();
            $input = $request->validated();

            if (
                $marriage_scheme['hod_status'] == 1 && $marriage_scheme['ac_status'] == 1 && $marriage_scheme['amc_status'] == 1 && $marriage_scheme['dmc_status'] == 2
                || $marriage_scheme['hod_status'] == 1 && $marriage_scheme['ac_status'] == 1 && $marriage_scheme['amc_status'] == 2 && $marriage_scheme['dmc_status'] == 1
                || $marriage_scheme['hod_status'] == 1 && $marriage_scheme['ac_status'] == 2 && $marriage_scheme['amc_status'] == 1 && $marriage_scheme['dmc_status'] == 1
                || $marriage_scheme['hod_status'] == 2 && $marriage_scheme['ac_status'] == 1 && $marriage_scheme['amc_status'] == 1 && $marriage_scheme['dmc_status'] == 1
                || $marriage_scheme['hod_status'] == 2 && $marriage_scheme['ac_status'] == 2 && $marriage_scheme['amc_status'] == 2 && $marriage_scheme['dmc_status'] == 2
                || $marriage_scheme['hod_status'] == 1 && $marriage_scheme['ac_status'] == 1 && $marriage_scheme['amc_status'] == 1 && $marriage_scheme['dmc_status'] == 2
                || $marriage_scheme['hod_status'] == 1 && $marriage_scheme['ac_status'] == 2 && $marriage_scheme['amc_status'] == 0 && $marriage_scheme['dmc_status'] == 0
                || $marriage_scheme['hod_status'] == 2 && $marriage_scheme['ac_status'] == 0 && $marriage_scheme['amc_status'] == 0 && $marriage_scheme['dmc_status'] == 0
                || $marriage_scheme['hod_status'] == 1 && $marriage_scheme['ac_status'] == 1 && $marriage_scheme['amc_status'] == 2 && $marriage_scheme['dmc_status'] == 0
            ) {
                $marriage_scheme['hod_status'] = 0;
                $marriage_scheme['ac_status']  = 0;
                $marriage_scheme['amc_status'] = 0;
                $marriage_scheme['dmc_status'] = 0;
            }

            // Handle file updates
            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('marriage_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('marriage_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $marriage_scheme->update(Arr::only($input, MarriageScheme::getFillables()));

            // update dynamic uploaded document
            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                DB::table('trans_marriage_scheme_documents')->where('marriage_id',$marriage_scheme['id'])->delete();
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('marriage_scheme_file/', $imageName);
                    DB::table('trans_marriage_scheme_documents')->insert([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "marriage_id" => $marriage_scheme['id'],
                        "created_by" => Auth::user()->id,
                        "created_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }
            
            DB::commit();
            return response()->json(['success' => 'Marriage Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Marriage Scheme');
        }
    }


    public function destroy(MarriageScheme $marriage_scheme)
    {
        try {
            DB::beginTransaction();
            $marriage_scheme->marriageSchemeDocuments()->delete();
            $marriage_scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Marriage Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Marriage Scheme');
        }
    }


    public function generateCertificate($id)
    {

        $data =  DB::table('trans_marriage_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.marriage_scheme.generate_certificate', compact('data'));
    }


    public function marriageSchemeApplicationView($id)
    {

        $data =  DB::table('trans_marriage_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();


        $document = DB::table('trans_marriage_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.marriage_id', $data->id)
            ->get();

        return view('users.marriage_scheme.view', compact('data', 'document'));
    }
}