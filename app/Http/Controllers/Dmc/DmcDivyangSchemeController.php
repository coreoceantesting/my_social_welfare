<?php

namespace App\Http\Controllers\Dmc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DisabilityApplication;
use Illuminate\Support\Facades\Auth;

class DmcDivyangSchemeController extends Controller
{
    public function divyangRegistrationList($status){

        $data =  DB::table('trans_disability_scheme AS t1')
                    ->select('t1.*', 't2.name', 't3.sign_uploaded_live_certificate')
                    ->leftJoin('hayticha_form AS t3', 't3.h_id', '=', 't1.hayat_id')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.amc_status', '=', 1)
                    ->where('t1.dmc_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->whereNull('t3.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('dmc.divyang_scheme.grid', compact('data', 'status'));
    }

    public function divyangRegistrationView($id, $status){

        $data =  DB::table('trans_disability_scheme AS t1')
                    ->select('t1.*', 't2.name')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.dmc_status', '=', $status)
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
                        ->where('t1.divyang_id',$data->id)
                        ->get();

      return view('dmc.divyang_scheme.view', compact('data', 'document'));

    }

    public function rejectDivyangApplication(request $request, $id){

        $update = [
            'dmc_status' => 2,
            'dmc_reject_reason' => $request->get('dmc_reject_reason'),
            'dmc_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_dmc' => Auth::user()->id,
        ];
        DisabilityApplication::where('id', $id)->update($update);
        return redirect('dmc_divyang_registration_list/2')->with('message', 'Divyang Application Rejected by DMC Successfully');
    }

    public function approveDivyangApplication(request $request, $id){

        if ($request->hasFile('dmc_sign')) {
            $imagePath = $request->file('dmc_sign')->store('divyang_nodani_file/dmc_sign', 'public');
        }

        $update = [
            'dmc_status' => 1,
            'dmc_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_dmc' => Auth::user()->id,
            'dmc_sign'=>$imagePath
        ];
        DisabilityApplication::where('id', $id)->update($update);
        return redirect('dmc_divyang_registration_list/1')->with('message', 'Divyang Application Approved by DMC Successfully');
    }

    public function generateCertificate($id, $status){

        $data =  DB::table('trans_disability_scheme AS t1')
                    ->select('t1.*', 't2.name')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.dmc_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        return view('dmc.divyang_scheme.generate_certificate', compact('data'));
    }
}