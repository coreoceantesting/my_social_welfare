<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreSportsRequest;
use App\Http\Requests\User\UpdateSportsRequest;
use App\Models\SportsScheme;
use App\Models\SportsSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SportsSchemeController extends Controller
{
    public function index(){

        $sports = SportsScheme::where('created_by', Auth::user()->id)->latest()->get();
        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 5)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('users.sports_scheme')->with(['sports'=>$sports,'document'=>$document]);
    }

    public function store(StoreSportsRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "SPO-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $sports = SportsScheme::create( Arr::only( $input, SportsScheme::getFillables() ) );

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('sports_scheme_file/', $imageName);
                    SportsSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "sports_id" => $sports->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=> 'Sports Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Sports Scheme');
        }
    }

    public function edit(SportsScheme $sports_scheme){
        if ($sports_scheme)
        {
            $response = [
                'result' => 1,
                'sports_scheme' => $sports_scheme,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateSportsRequest $request, SportsScheme $sports_scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $sports_scheme->update( Arr::only( $input, SportsScheme::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Sports Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Sports Scheme');
        }
    }


    public function destroy(SportsScheme $sports_scheme)
    {
        try
        {
            DB::beginTransaction();
            $sports_scheme->delete();
            DB::commit();
            return response()->json(['success'=> 'Sports Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Sports Scheme');
        }
    }
}
