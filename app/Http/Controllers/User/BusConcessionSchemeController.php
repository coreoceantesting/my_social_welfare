<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreBusConcessionRequest;
use App\Http\Requests\User\UpdateBusConcessionRequest;
use App\Models\BusConcession;
use App\Models\BusConcessionDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BusConcessionSchemeController extends Controller
{
    public function index(){
        $bus_concession = BusConcession::where('created_by', Auth::user()->id)->latest()->get();

        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 2)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('users.bus_concession')->with(['bus_concession'=> $bus_concession, 'document'=>$document]);
    }

    public function store(StoreBusConcessionRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "BUS-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $bus_concession = BusConcession::create( Arr::only( $input, BusConcession::getFillables() ) );

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('bus_concession_file/', $imageName);
                    BusConcessionDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "bus_concession_id" => $bus_concession->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=> 'Bus Concession created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Bus Concession');
        }

    }


    public function edit(BusConcession $bus_concession){
        if ($bus_concession)
        {
            $response = [
                'result' => 1,
                'bus_concession' => $bus_concession,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    public function update(UpdateBusConcessionRequest $request, BusConcession $bus_concession)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $bus_concession->update( Arr::only( $input, BusConcession::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Bus Concession updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Bus Concession');
        }
    }


    public function destroy(BusConcession $bus_concession)
    {
        try
        {
            DB::beginTransaction();
            $bus_concession->delete();
            DB::commit();
            return response()->json(['success'=> 'Bus Concession deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Bus Concession');
        }
    }
}