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
    public function index(){
        $cancer = CancerScheme::where('created_by', Auth::user()->id)->latest()->get();
        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 7)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('users.cancer_scheme')->with(['cancer'=>$cancer,'document'=>$document]);
    }

    public function store(StoreCancerRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "CAN-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $cancer = CancerScheme::create( Arr::only( $input, CancerScheme::getFillables() ) );

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
            return response()->json(['success'=> 'Cancer Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Cancer Scheme');
        }
    }

    public function edit(CancerScheme $cancer_scheme){
        if ($cancer_scheme)
        {
            $response = [
                'result' => 1,
                'cancer_scheme' => $cancer_scheme,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateCancerRequest $request, CancerScheme $cancer_scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $cancer_scheme->update( Arr::only( $input, CancerScheme::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Cancer Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Cancer Scheme');
        }
    }


    public function destroy(CancerScheme $cancer_scheme)
    {
        try
        {
            DB::beginTransaction();
            $cancer_scheme->delete();
            DB::commit();
            return response()->json(['success'=> 'Cancer Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Cancer Scheme');
        }
    }
}
