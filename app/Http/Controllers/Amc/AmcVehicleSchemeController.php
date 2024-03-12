<?php

namespace App\Http\Controllers\Amc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleScheme;

class AmcVehicleSchemeController extends Controller
{
    public function vehicleSchemeApplicationList($status){

        $data =  DB::table('trans_vehicle_scheme AS t1')
                    ->leftJoin('users AS t3', 't3.id', '=', 't1.created_by')
                    ->leftJoin('hayticha_form AS t4', 't3.id', '=', 't4.user_id')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.amc_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get(['t1.*', 't3.category' , 't4.sign_uploaded_live_certificate']);

        return view('amc.vehicle_scheme.grid', compact('data', 'status'));
    }

    public function vehicleSchemeApplicationView($id, $status){

        $data =  DB::table('trans_vehicle_scheme AS t1')
                    ->where('t1.amc_status', '=', $status)
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

      return view('amc.vehicle_scheme.view', compact('data', 'document'));

    }


    public function rejectVehicleSchemeApplication(request $request, $id){

        $update = [
            'amc_status' => 2,
            'amc_reject_reason' => $request->get('amc_reject_reason'),
            'amc_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_amc' => Auth::user()->id,
        ];
        VehicleScheme::where('id', $id)->update($update);
        return redirect('amc_vehicle_scheme_application_list/2')->with('message', 'Vehicle Scheme Application Rejected by AMC Successfully');
    }

    public function approveVehicleSchemeApplication(request $request, $id){

        $update = [
            'amc_status' => 1,
            'amc_approval_date' => date("Y-m-d H:i:s"),
            'amc_remark' => $request->get('remark'),
            'approve_by_amc' => Auth::user()->id,
        ];
        VehicleScheme::where('id', $id)->update($update);
        return redirect('amc_vehicle_scheme_application_list/1')->with('message', 'Vehicle Scheme Application Approved by AMC Successfully');
    }
}