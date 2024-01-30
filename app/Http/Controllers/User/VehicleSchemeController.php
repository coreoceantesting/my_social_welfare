<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreVehicleRequest;
use App\Http\Requests\User\UpdateVehicleRequest;
use App\Models\VehicleScheme;
use App\Models\VehicleSchemeDocuments_model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VehicleSchemeController extends Controller
{
    public function index(){
        $vehicles = VehicleScheme::where('created_by', Auth::user()->id)->latest()->get();

        $document = DB::table('document_type_msts')
                        ->where('scheme_id', 8)
                        ->whereNull('deleted_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('users.vehicle')->with(['vehicles'=>$vehicles,'document'=>$document]);
    }

    public function store(StoreVehicleRequest $request){
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $unique_id = "VEH-SCH".rand(100000,10000000);
            $input['application_no'] = $unique_id;
            $vehicle_scheme = VehicleScheme::create( Arr::only( $input, VehicleScheme::getFillables() ) );

            $documentTypeIds = $request->input('document_id');
            if ($request->hasFile("document_file")) {
                $files = $request->file("document_file");
                foreach ($files as $key => $file) {
                    $documentTypeId = $documentTypeIds[$key];
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('vehicle_scheme_file/', $imageName);
                    VehicleSchemeDocuments_model::create([
                        "document_file" => $imageName,
                        'document_id' => $documentTypeId,
                        "vehicle_id" => $vehicle_scheme->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success'=> 'Vehicle Scheme created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Vehicle Scheme');
        }

    }

    public function edit(VehicleScheme $vehicle_scheme){
        if ($vehicle_scheme)
        {
            $response = [
                'result' => 1,
                'vehicle_scheme' => $vehicle_scheme,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function update(UpdateVehicleRequest $request, VehicleScheme $vehicle_scheme)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $vehicle_scheme->update( Arr::only( $input, VehicleScheme::getFillables() ) );
            DB::commit();
            return response()->json(['success'=> 'Vehicle Scheme updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Vehicle Scheme');
        }
    }


    public function destroy(VehicleScheme $vehicle_scheme)
    {
        try
        {
            DB::beginTransaction();
            $vehicle_scheme->delete();
            DB::commit();
            return response()->json(['success'=> 'Vehicle Scheme deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Vehicle Scheme');
        }
    }

}
