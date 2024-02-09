<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleScheme;

class HodVehicleSchemeController extends Controller
{
    public function vehicleSchemeApplicationList($status){

        $data =  DB::table('trans_vehicle_scheme AS t1')
                    ->where('t1.hod_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('hod.vehicle_scheme.grid', compact('data', 'status'));
    }

    public function vehicleSchemeApplicationView($id, $status){

        $data =  DB::table('trans_vehicle_scheme AS t1')
                    ->where('t1.hod_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        $document = DB::table('trans_vehicle_scheme_documents AS t1')
                        ->select('t1.*', 't2.document_name')
                        ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
                        ->whereNull('t1.deleted_at')
                        ->where('t1.vehicle_id',$data->id)
                        ->get();

      return view('hod.vehicle_scheme.view', compact('data', 'document'));

    }


    public function rejectVehicleSchemeApplication(request $request, $id){

        $update = [
            'hod_status' => 2,
            'hod_reject_reason' => $request->get('hod_reject_reason'),
            'hod_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_hod' => Auth::user()->id,
        ];
        VehicleScheme::where('id', $id)->update($update);
        return redirect('vehicle_scheme_application_list/2')->with('message', 'Vehicle Scheme Application Rejected by HOD Successfully');
    }

    public function approveVehicleSchemeApplication(request $request, $id){

        $update = [
            'hod_status' => 1,
            'hod_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_hod' => Auth::user()->id,
        ];
        VehicleScheme::where('id', $id)->update($update);
        return redirect('vehicle_scheme_application_list/1')->with('message', 'Vehicle Scheme Application Approved by HOD Successfully');
    }
}