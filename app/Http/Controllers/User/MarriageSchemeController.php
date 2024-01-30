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

class MarriageSchemeController extends Controller
{
    public function index(){
        $marriage=MarriageScheme::where('created_by', Auth::user()->id)->latest()->get();
        $wards = Ward::latest()->get();
        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 4)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('users.marriage_scheme')->with(['marriage'=>$marriage,'wards' => $wards,'document'=>$document]);
    }

    public function store(StoreMarriageRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "MAR-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $marriage = MarriageScheme::create( Arr::only( $input, MarriageScheme::getFillables() ) );

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
            return response()->json(['success'=> 'Marriage Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Marriage Scheme');
        }
    }

    public function edit(MarriageScheme $marriage_scheme)
    {
        $wards = Ward::latest()->get();
        // $marriage_scheme->load('wardss')->first();
        $marriage_scheme->load(['wardss', 'marriageSchemeDocuments.document']);


        if ($marriage_scheme)
        {
            $wardHtml = '<span>
            <option value="">--Select Scheme--</option>';
            foreach($wards as $ward):
                $is_select = $ward->id == $marriage_scheme->ward_id ? "selected" : "";
                $wardHtml .= '<option value="'.$ward->id.'" '.$is_select.'>'.$ward->name.'</option>';
            endforeach;
            $wardHtml .= '</span>';

            $response = [
                'result' => 1,
                'marriage_scheme' => $marriage_scheme,
                'wardHtml'=>$wardHtml,
                'documents' => $marriage_scheme->marriageSchemeDocuments,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateMarriageRequest $request, MarriageScheme $marriage_scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $marriage_scheme->update( Arr::only( $input, MarriageScheme::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Marriage Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Marriage Scheme');
        }
    }


    public function destroy(MarriageScheme $marriage_scheme)
    {
        try
        {
            DB::beginTransaction();
            $marriage_scheme->delete();
            DB::commit();
            return response()->json(['success'=> 'Marriage Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Marriage Scheme');
        }
    }


}