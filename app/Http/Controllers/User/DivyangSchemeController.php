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
use App\Models\DivyangSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DivyangSchemeController extends Controller
{
    public function uploaded_doc(){
        $hayat = HayatFormModel::latest()->get();
        $users = FinancialMst::where('is_active', 1)->first();

        return view('users.uploaded_document')->with(['users'=> $users, 'hayat' => $hayat]);
    }


    public function index()
    {
            $data = HayatFormModel::where('user_id', Auth::user()->id)->latest()->first();

            if (empty($data)) {
            //  echo "fdg"; die;
                return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Fill the first form before proceeding.');
            } elseif ($data->sign_uploaded_live_certificate == "") {

                return redirect()->route('hayatichaDakhlaform.index')->with('warning', 'Your Application status is still Pending');
            } else {

                $disable = DisabilityApplication::where('created_by', Auth::user()->id)->latest()->get();
                $wards = Ward::latest()->get();

                $document = DB::table('document_type_msts')
                    ->where('scheme_id', 1)
                    ->whereNull('deleted_at')
                    ->orderBy('created_at', 'DESC')
                    ->get();

                return view('users.scheme_form')->with(['disable' => $disable, 'wards' => $wards, 'document' => $document]);

            }

    }


    public function store(StoreApplicationRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "DIS-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $disable=DisabilityApplication::create( Arr::only( $input, DisabilityApplication::getFillables() ) );

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
            return response()->json(['success'=> 'Disability Application created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Disability Application');
        }

    }

    public function edit(DisabilityApplication $scheme_form)
    {
        $wards = Ward::latest()->get();
        $scheme_form->load(['wardss', 'divyangSchemeDocuments.document']);
        // $scheme_form->load('wardss')->first();

        if ($scheme_form)
        {
            $wardHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach($wards as $ward):
                $is_select = $ward->id == $scheme_form->ward_id ? "selected" : "";
                $wardHtml .= '<option value="'.$ward->id.'" '.$is_select.'>'.$ward->name.'</option>';
            endforeach;
            $wardHtml .= '</span>';

            $response = [
                'result' => 1,
                'scheme_form' => $scheme_form,
                'wardHtml'=>$wardHtml,
                'documents' => $scheme_form->divyangSchemeDocuments,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateApplicationRequest $request, DisabilityApplication $scheme_form)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $scheme_form->update( Arr::only( $input, DisabilityApplication::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Disability Application updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Disability Application');
        }
    }

    public function destroy(DisabilityApplication $scheme_form)
    {
        try
        {
            DB::beginTransaction();

            $scheme_form->divyangSchemeDocuments()->delete();

            $scheme_form->delete();
            DB::commit();
            return response()->json(['success'=> 'Disability Application deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Disability Application');
        }
    }
}