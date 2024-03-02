<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreEducationRequest;
use App\Http\Requests\User\UpdateEducationRequest;
use App\Models\EducationScheme;
use App\Models\EducationSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\HayatFormModel;

class EducationSchemeController extends Controller
{

    public function list()
    {
        $education_scheme = EducationScheme::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.education_scheme.application_list')->with(['education_scheme' => $education_scheme]);
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
                $education_scheme = EducationScheme::where('created_by', Auth::user()->id)->latest()->first();
                if (!empty($education_scheme)) {
                    return redirect('education_scheme_application')->with('warning', 'You Have already apply for this form');
                }

                $document = DB::table('document_type_msts')
                    ->where('scheme_id', $scheme_id)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->get();
                return view('users.education_scheme.education_scheme')->with(['document' => $document]);
            }
        } else {
            $education_scheme = EducationScheme::where('created_by', Auth::user()->id)->latest()->first();
            if (!empty($education_scheme)) {
                return redirect('education_scheme_application')->with('warning', 'You Have already apply for this form');
            }

            $document = DB::table('document_type_msts')
                ->where('scheme_id', 3)
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'DESC')
                ->get();
            return view('users.education_scheme.education_scheme')->with(['document' => $document]);
        }
    }

    public function store(StoreEducationRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('education_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('education_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $unique_id = "EDU-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $education = EducationScheme::create(Arr::only($input, EducationScheme::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");

                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('education_scheme_file/', $imageName);
                    EducationSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "education_id" => $education->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Education Scheme created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Education Scheme');
        }
    }

    public function edit(EducationScheme $education_scheme)
    {

        $education_scheme->load('educationSchemeDocuments.document');

        if ($education_scheme) {
            $response = [
                'result' => 1,
                'education_scheme' => $education_scheme,
                'documents' => $education_scheme->educationSchemeDocuments,

            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateEducationRequest $request, EducationScheme $education_scheme)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('education_scheme_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('education_scheme_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            if (
                $education_scheme['hod_status'] == 1 && $education_scheme['ac_status'] == 1 && $education_scheme['amc_status'] == 1 && $education_scheme['dmc_status'] == 2
                || $education_scheme['hod_status'] == 1 && $education_scheme['ac_status'] == 1 && $education_scheme['amc_status'] == 2 && $education_scheme['dmc_status'] == 1
                || $education_scheme['hod_status'] == 1 && $education_scheme['ac_status'] == 2 && $education_scheme['amc_status'] == 1 && $education_scheme['dmc_status'] == 1
                || $education_scheme['hod_status'] == 2 && $education_scheme['ac_status'] == 1 && $education_scheme['amc_status'] == 1 && $education_scheme['dmc_status'] == 1
                || $education_scheme['hod_status'] == 2 && $education_scheme['ac_status'] == 2 && $education_scheme['amc_status'] == 2 && $education_scheme['dmc_status'] == 2
                || $education_scheme['hod_status'] == 1 && $education_scheme['ac_status'] == 1 && $education_scheme['amc_status'] == 1 && $education_scheme['dmc_status'] == 2
                || $education_scheme['hod_status'] == 1 && $education_scheme['ac_status'] == 2 && $education_scheme['amc_status'] == 0 && $education_scheme['dmc_status'] == 0
                || $education_scheme['hod_status'] == 2 && $education_scheme['ac_status'] == 0 && $education_scheme['amc_status'] == 0 && $education_scheme['dmc_status'] == 0
                || $education_scheme['hod_status'] == 1 && $education_scheme['ac_status'] == 1 && $education_scheme['amc_status'] == 2 && $education_scheme['dmc_status'] == 0
            ) {
                $education_scheme['hod_status'] = 0;
                $education_scheme['ac_status']  = 0;
                $education_scheme['amc_status'] = 0;
                $education_scheme['dmc_status'] = 0;
            }
            $education_scheme->update(Arr::only($input, EducationScheme::getFillables()));
            DB::commit();
            return response()->json(['success' => 'Education Scheme updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Education Scheme');
        }
    }


    public function destroy(EducationScheme $education_scheme)
    {
        try {
            DB::beginTransaction();
            $education_scheme->educationSchemeDocuments()->delete();
            $education_scheme->delete();
            DB::commit();
            return response()->json(['success' => 'Education Scheme deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Education Scheme');
        }
    }

    public function eductationSchemeApplicationView($id)
    {

        $data =  DB::table('trans_education_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_education_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.education_id', $data->id)
            ->get();

        return view('users.education_scheme.view', compact('data', 'document'));
    }

    public function generateCertificate($id)
    {

        $data =  DB::table('trans_education_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.education_scheme.generate_certificate', compact('data'));
    }

    public function educationSchemeCertificate($id)
    {
        $data =  DB::table('trans_education_scheme AS t1')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_education_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.education_id', $data->id)
            ->get();

        return view('users.education_scheme.education_scheme_certificate_view', compact('data', 'document'));
    }
}