<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class allEducationSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheme_detail = DB::table('all_education_scheme_details')->where('created_by', Auth::user()->id)->whereNull('deleted_by')->get();
        $wards = Ward::latest()->get(['name']);
        $scheme_id = session('scheme_id');
        $document = DB::table('document_type_msts')
                    ->where('scheme_id', $scheme_id)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('users.all_education_scheme.index')->with(['scheme_detail' => $scheme_detail, 'wards' => $wards, 'document' => $document]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'full_name' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'marital_status' => 'required',
                'cast_category' => 'required',
                'mobile_no' => 'required|min:10|max:10',
                'aadhar_no' => 'required|min:12|max:12',
                'father_or_husband_full_name' => 'required',
                'mother_full_name' => 'required',
                'address' => 'required',
                'occupation' => 'required',
                'annual_income' => 'required',
                'ward' => 'required',
                'years_lived_in_ward' => 'required',
                'educational_qulification' => 'required',
                'scholarship_name' => 'required',
                'marks_obtained' => 'required',
                'scholarship_year' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
                'account_holder_name' => 'required',
                'account_no' => 'required',
                'ifsc_code' => 'required',
                'candidate_signature' => 'required|file|mimes:pdf,doc,docx,png,jpeg',
                'passport_size_photo' => 'required|file|mimes:pdf,doc,docx,png,jpeg',
            ]);

            if ($request->hasFile('candidate_signature')) {
                $candidate_signature_file = $request->file('candidate_signature');
                $candidate_signature_file_path = $candidate_signature_file->store('allEducationDetails/candidate_signature_files', 'public');
            }

            if ($request->hasFile('passport_size_photo')) {
                $passport_size_photo_file = $request->file('passport_size_photo');
                $passport_size_photo_file_path = $passport_size_photo_file->store('allEducationDetails/passport_size_photo_file', 'public');
            }

            $unique_id = "EDU-SCH" . rand(100000, 10000000);

            // Store data in vehicle_history table
           $application_id =  DB::table('all_education_scheme_details')->insertGetId([
                'application_no' => $unique_id,
                'full_name' => $request->input('full_name'),
                'gender' => $request->input('gender'),
                'dob' => $request->input('dob'),
                'marital_status' => $request->input('marital_status'),
                'cast_category' => $request->input('cast_category'),
                'mobile_no' => $request->input('mobile_no'),
                'aadhar_no' => $request->input('aadhar_no'),
                'father_or_husband_full_name' => $request->input('father_or_husband_full_name'),
                'mother_full_name' => $request->input('mother_full_name'),
                'address' => $request->input('address'),
                'occupation' => $request->input('occupation'),
                'annual_income' => $request->input('annual_income'),
                'ward' => $request->input('ward'),
                'years_lived_in_ward' => $request->input('years_lived_in_ward'),
                'educational_qulification' => $request->input('educational_qulification'),
                'scholarship_name' => $request->input('scholarship_name'),
                'marks_obtained' => $request->input('marks_obtained'),
                'scholarship_year' => $request->input('scholarship_year'),
                'type_of_disability' => $request->input('type_of_disability'),
                'disability_certificate_no' => $request->input('disability_certificate_no'),
                'hospital_name' => $request->input('hospital_name'),
                'degree_of_disability' => $request->input('degree_of_disability'),
                'bank_name' => $request->input('bank_name'),
                'branch_name' => $request->input('branch_name'),
                'account_holder_name' => $request->input('account_holder_name'),
                'account_no' => $request->input('account_no'),
                'ifsc_code' => $request->input('ifsc_code'),
                'passport_size_photo' => isset($passport_size_photo_file_path) ? $passport_size_photo_file_path : null,
                'candidate_signature' => isset($candidate_signature_file_path) ? $candidate_signature_file_path : null,
                'created_by' => Auth::user()->id,
                'created_at' => now(),
            ]);

            // insert dynamic document
            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('education_scheme_file/', $imageName);
                    DB::table('all_education_scheme_documents')->insert([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "all_education_scheme_id" => $application_id,
                        "created_by" => Auth::user()->id,
                        "created_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            return response()->json(['success' => 'Education Form Submitted Successfully!']);
        } catch (ValidationException $e) {
            // If validation fails, return validation errors
            return response()->json(['errors' => $e->errors()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $formDetail = DB::table('all_education_scheme_details')
                ->where('all_education_scheme_detail_id', $id)
                ->first();
        $documents = DB::table('all_education_scheme_documents')
        ->join('document_type_msts', 'all_education_scheme_documents.document_id', '=', 'document_type_msts.id')
        ->where('all_education_scheme_documents.all_education_scheme_id', $id)
        ->get(['all_education_scheme_documents.*', 'document_type_msts.document_name']);

        return response()->json([
            'formDetail' => $formDetail,
            'documents' => $documents,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
    }

    public function update_details(Request $request)
    {

        try {
            // Validate the request data
            $request->validate([
                'full_name' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'marital_status' => 'required',
                'cast_category' => 'required',
                'mobile_no' => 'required|min:10|max:10',
                'aadhar_no' => 'required|min:12|max:12',
                'father_or_husband_full_name' => 'required',
                'mother_full_name' => 'required',
                'address' => 'required',
                'occupation' => 'required',
                'annual_income' => 'required',
                'ward' => 'required',
                'years_lived_in_ward' => 'required',
                'educational_qulification' => 'required',
                'scholarship_name' => 'required',
                'marks_obtained' => 'required',
                'scholarship_year' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
                'account_holder_name' => 'required',
                'account_no' => 'required',
                'ifsc_code' => 'required',
                'candidate_signature' => 'nullable|file|mimes:pdf,doc,docx,png,jpeg',
                'passport_size_photo' => 'nullable|file|mimes:pdf,doc,docx,png,jpeg',
            ]);

            $id = $request->input('edit_model_id');

            $formDetails = DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->first();
    
            if (!$formDetails) {
                return response()->json(['error' => 'Form details not found.']);
            }

            if ($request->hasFile('candidate_signature')) {
                $candidate_signature_file = $request->file('candidate_signature');
                $candidate_signature_file_path = $candidate_signature_file->store('allEducationDetails/candidate_signature_files', 'public');
            }

            if ($request->hasFile('passport_size_photo')) {
                $passport_size_photo_file = $request->file('passport_size_photo');
                $passport_size_photo_file_path = $passport_size_photo_file->store('allEducationDetails/passport_size_photo_file', 'public');
            }

    
            // Update Form Details 
           $application_id =  DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
            'full_name' => $request->input('full_name'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'marital_status' => $request->input('marital_status'),
            'cast_category' => $request->input('cast_category'),
            'mobile_no' => $request->input('mobile_no'),
            'aadhar_no' => $request->input('aadhar_no'),
            'father_or_husband_full_name' => $request->input('father_or_husband_full_name'),
            'mother_full_name' => $request->input('mother_full_name'),
            'address' => $request->input('address'),
            'occupation' => $request->input('occupation'),
            'annual_income' => $request->input('annual_income'),
            'ward' => $request->input('ward'),
            'years_lived_in_ward' => $request->input('years_lived_in_ward'),
            'educational_qulification' => $request->input('educational_qulification'),
            'scholarship_name' => $request->input('scholarship_name'),
            'marks_obtained' => $request->input('marks_obtained'),
            'scholarship_year' => $request->input('scholarship_year'),
            'type_of_disability' => $request->input('type_of_disability'),
            'disability_certificate_no' => $request->input('disability_certificate_no'),
            'hospital_name' => $request->input('hospital_name'),
            'degree_of_disability' => $request->input('degree_of_disability'),
            'bank_name' => $request->input('bank_name'),
            'branch_name' => $request->input('branch_name'),
            'account_holder_name' => $request->input('account_holder_name'),
            'account_no' => $request->input('account_no'),
            'ifsc_code' => $request->input('ifsc_code'),
            'passport_size_photo' => isset($passport_size_photo_file_path) ? $passport_size_photo_file_path : $formDetails->passport_size_photo,
            'candidate_signature' => isset($candidate_signature_file_path) ? $candidate_signature_file_path : $formDetails->candidate_signature,
            'updated_by' => Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    
            // update dynamic document
            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                DB::table('all_education_scheme_documents')->where('all_education_scheme_id',$id)->delete();
                $files = $request->file("document_file");

                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('education_scheme_file/', $imageName);
                    DB::table('all_education_scheme_documents')->insert([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "all_education_scheme_id" => $id,
                        "updated_by" => Auth::user()->id,
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }
    
            return response()->json(['success' => 'Forn Details Updated successfully!']);
        } catch (ValidationException $e) {
            // If validation fails, return validation errors
            return response()->json(['errors' => $e->errors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id',$id)->update([
                'deleted_by' => Auth::user()->id,
                'deleted_at' => date('Y-m-d H:i:s'),
            ]);
        
            DB::commit();
            return response()->json(['success' => 'Details Are Deleted successfully!']);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->respondWithAjax($e, 'deleting', 'details');
        }
    }
}
