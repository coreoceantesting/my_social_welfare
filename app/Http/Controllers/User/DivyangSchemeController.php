<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreApplicationRequest;
use App\Http\Requests\User\UpdateApplicationRequest;
use App\Models\HayatFormModel;
use App\Models\FinancialMst;
use App\Models\DisabilityApplication;
use App\Models\Ward;
use App\Models\CategoryMst;
use App\Models\DivyangSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DivyangSchemeController extends Controller
{
    public function uploaded_doc()
    {

        $hayat = HayatFormModel::where('user_id', Auth::user()->id)->latest()->get();
        $users = FinancialMst::where('is_active', 1)->first();

        return view('users.uploaded_document')->with(['users' => $users, 'hayat' => $hayat]);
    }



    public function list()
    {
        $disable = DisabilityApplication::where('created_by', Auth::user()->id)->latest()->get();
        return view('users.divyang_scheme.application_list')->with(['disable' => $disable]);
    }



    public function index()
    {
        $scheme_id = session('scheme_id');
        $data = HayatFormModel::where('user_id', Auth::user()->id)->latest()->first();
        $role_category_list = CategoryMst::whereNull('deleted_by')->take(2)->get();

        if (empty($data)) {
            //  echo "fdg"; die;
            return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Fill the Hayatika form before proceeding.');
        } elseif ($data->sign_uploaded_live_certificate == "") {

            return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Your Application status is still Pending');
        } else {

            $disable = DisabilityApplication::where('created_by', Auth::user()->id)->latest()->first();

            if (!empty($disable)) {
                return redirect('divyang_application')->with('warning', 'You Have already apply for this form');
            } else {

                $wards = Ward::latest()->get();

                $document = DB::table('document_type_msts')
                    ->where('scheme_id', $scheme_id)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->get();

                return view('users.divyang_scheme.scheme_form')->with(['wards' => $wards, 'document' => $document, 'role_category_list' => $role_category_list]);
            }
        }
    }


    public function store(StoreApplicationRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $data = HayatFormModel::where('user_id', Auth::user()->id)->latest()->first();

            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('divyang_nodani_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('divyang_nodani_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }


            $unique_id = "DIS-SCH" . rand(100000, 10000000);
            $input['application_no'] = $unique_id;
            $input['hayat_id'] = $data->h_id;
            $input['agriculture'] = $request->input('agriculture');
            $input['received_year'] = $request->input('received_year');
            $disable = DisabilityApplication::create(Arr::only($input, DisabilityApplication::getFillables()));

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('divyang_nodani_file/', $imageName);
                    DivyangSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "divyang_id" => $disable->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Disability Application created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Disability Application');
        }
    }

    public function edit(DisabilityApplication $scheme_form)
    {
        $wards = Ward::latest()->get();
        $scheme_form->load(['wardss', 'divyangSchemeDocuments.document']);
        $role_category_list = CategoryMst::whereNull('deleted_by')->take(2)->get();
        // $scheme_form->load('wardss')->first();

        if ($scheme_form) {
            $wardHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach ($wards as $ward) :
                $is_select = $ward->id == $scheme_form->ward_id ? "selected" : "";
                $wardHtml .= '<option value="' . $ward->id . '" ' . $is_select . '>' . $ward->name . '</option>';
            endforeach;
            $wardHtml .= '</span>';

            $categoryListHtml = '<span>
            <option value="">--Select Category--</option>';
            foreach ($role_category_list as $list) :
                $is_select = $list->id == $scheme_form->category_id ? "selected" : "";
                $categoryListHtml .= '<option value="' . $list->id . '" ' . $is_select . '>' . $list->category_name . '</option>';
            endforeach;
            $categoryListHtml .= '</span>';

            $response = [
                'result' => 1,
                'scheme_form' => $scheme_form,
                'wardHtml' => $wardHtml,
                'categoryListHtml' => $categoryListHtml,
                'documents' => $scheme_form->divyangSchemeDocuments,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateApplicationRequest $request, DisabilityApplication $scheme_form)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();

            if (
                $scheme_form['hod_status'] == 1 && $scheme_form['ac_status'] == 1 && $scheme_form['amc_status'] == 1 && $scheme_form['dmc_status'] == 2
                || $scheme_form['hod_status'] == 1 && $scheme_form['ac_status'] == 1 && $scheme_form['amc_status'] == 2 && $scheme_form['dmc_status'] == 1
                || $scheme_form['hod_status'] == 1 && $scheme_form['ac_status'] == 2 && $scheme_form['amc_status'] == 1 && $scheme_form['dmc_status'] == 1
                || $scheme_form['hod_status'] == 2 && $scheme_form['ac_status'] == 1 && $scheme_form['amc_status'] == 1 && $scheme_form['dmc_status'] == 1
                || $scheme_form['hod_status'] == 2 && $scheme_form['ac_status'] == 2 && $scheme_form['amc_status'] == 2 && $scheme_form['dmc_status'] == 2
                || $scheme_form['hod_status'] == 1 && $scheme_form['ac_status'] == 1 && $scheme_form['amc_status'] == 1 && $scheme_form['dmc_status'] == 2
                || $scheme_form['hod_status'] == 1 && $scheme_form['ac_status'] == 2 && $scheme_form['amc_status'] == 0 && $scheme_form['dmc_status'] == 0
                || $scheme_form['hod_status'] == 2 && $scheme_form['ac_status'] == 0 && $scheme_form['amc_status'] == 0 && $scheme_form['dmc_status'] == 0
                || $scheme_form['hod_status'] == 1 && $scheme_form['ac_status'] == 1 && $scheme_form['amc_status'] == 2 && $scheme_form['dmc_status'] == 0
            ) {
                $scheme_form['hod_status'] = 0;
                $scheme_form['ac_status']  = 0;
                $scheme_form['amc_status'] = 0;
                $scheme_form['dmc_status'] = 0;
            }
            
            // update uploaded file
            if ($request->hasFile('candidate_signature')) {
                $imagePath = $request->file('candidate_signature')->store('divyang_nodani_file/candidate_signature', 'public');
                $input['candidate_signature'] = $imagePath;
            }

            if ($request->hasFile('passport_size_photo')) {
                $imagePath1 = $request->file('passport_size_photo')->store('divyang_nodani_file/passport_size_photo', 'public');
                $input['passport_size_photo'] = $imagePath1;
            }

            $input['agriculture'] = $request->input('agriculture');
            $input['received_year'] = $request->input('received_year');

            $scheme_form->update(Arr::only($input, DisabilityApplication::getFillables()));

            // update dynamic documents
            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                DB::table('trans_divyang_scheme_documents')->where('divyang_id',$scheme_form['id'])->delete();
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('divyang_nodani_file/', $imageName);
                    DB::table('trans_divyang_scheme_documents')->insert([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "divyang_id" => $scheme_form['id'],
                        "updated_by" => Auth::user()->id,
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => 'Disability Application updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Disability Application');
        }
    }

    public function destroy(DisabilityApplication $scheme_form)
    {
        try {
            DB::beginTransaction();

            $scheme_form->divyangSchemeDocuments()->delete();

            $scheme_form->delete();
            DB::commit();
            return response()->json(['success' => 'Disability Application deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Disability Application');
        }
    }


    public function divyangRegistrationView($id)
    {

        $data =  DB::table('trans_disability_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        //    dd($data->id);
        $document = DB::table('trans_divyang_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.divyang_id', $data->id)
            ->get();

        return view('users.divyang_scheme.view', compact('data', 'document'));
    }


    public function generateCertificate($id)
    {

        $data =  DB::table('trans_disability_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        return view('users.divyang_scheme.generate_certificate', compact('data'));
    }

    public function divyangCertificate($id)
    {

        $data =  DB::table('trans_disability_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();


        $document = DB::table('trans_divyang_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.divyang_id', $data->id)
            ->get();

        return view('users.divyang_scheme.scheme_certificate_view', compact('data', 'document'));
    }
}
