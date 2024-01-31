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

class EducationSchemeController extends Controller
{
    public function index(){
        $education_scheme = EducationScheme::where('created_by', Auth::user()->id)->latest()->get();


        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 3)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('users.education_scheme')->with(['education_scheme'=> $education_scheme, 'document'=>$document]);
    }

    public function store(StoreEducationRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "EDU-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $education =EducationScheme::create( Arr::only( $input, EducationScheme::getFillables() ) );

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
            return response()->json(['success'=> 'Education Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Education Scheme');
        }

    }

    public function edit(EducationScheme $education_scheme){

        $education_scheme->load('educationSchemeDocuments.document');

        if ($education_scheme)
        {
            $response = [
                'result' => 1,
                'education_scheme' => $education_scheme,
                'documents' => $education_scheme->educationSchemeDocuments,

            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateEducationRequest $request, EducationScheme $education_scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $education_scheme->update( Arr::only( $input, EducationScheme::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Education Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Education Scheme');
        }
    }


    public function destroy(EducationScheme $education_scheme)
    {
        try
        {
            DB::beginTransaction();
            $education_scheme->delete();
            DB::commit();
            return response()->json(['success'=> 'Education Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Education Scheme');
        }
    }
}
