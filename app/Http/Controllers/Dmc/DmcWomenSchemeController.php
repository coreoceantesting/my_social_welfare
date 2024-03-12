<?php

namespace App\Http\Controllers\Dmc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\WomenScheme;

class DmcWomenSchemeController extends Controller
{
    public function womenSchemeApplicationList($status){

        $data =  DB::table('trans_women_scheme AS t1')
                    ->select('t1.*', 't2.name','t3.category','t4.sign_uploaded_live_certificate')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->leftJoin('users AS t3', 't3.id', '=', 't1.created_by')
                    ->leftJoin('hayticha_form AS t4', 't3.id', '=', 't4.user_id')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.amc_status', '=', 1)
                    ->where('t1.dmc_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('dmc.women_scheme.grid', compact('data', 'status'));
    }

    public function womenSchemeApplicationView($id, $status){

        $data =  DB::table('trans_women_scheme AS t1')
                    ->select('t1.*', 't2.name')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.dmc_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();


        $document = DB::table('trans_women_scheme_documents AS t1')
                        ->select('t1.*', 't2.document_name')
                        ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
                        ->whereNull('t1.deleted_at')
                        ->where('t1.women_id',$data->id)
                        ->get();

      return view('dmc.women_scheme.view', compact('data', 'document'));

    }


    public function rejectWomenSchemeApplication(request $request, $id){

        $update = [
            'dmc_status' => 2,
            'dmc_reject_reason' => $request->get('dmc_reject_reason'),
            'dmc_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_dmc' => Auth::user()->id,
        ];
        WomenScheme::where('id', $id)->update($update);
        return redirect('dmc_women_scheme_application_list/2')->with('message', 'Women Sewing/Beautisians Scheme Application Rejected by DMC Successfully');
    }

    public function approveWomenSchemeApplication(request $request, $id){

        if ($request->hasFile('dmc_sign')) {
            $imagePath = $request->file('dmc_sign')->store('women_scheme_file/dmc_sign', 'public');
        }

        $update = [
            'dmc_status' => 1,
            'dmc_approval_date' => date("Y-m-d H:i:s"),
            'dmc_remark' => $request->get('remark'),
            'approve_by_dmc' => Auth::user()->id,
            'dmc_sign'=>$imagePath
        ];
        WomenScheme::where('id', $id)->update($update);
        return redirect('dmc_women_scheme_application_list/1')->with('message', 'Women Sewing/Beautisians Scheme Application Approved by DMC Successfully');
    }

    public function generateCertificate($id, $status){

        $data =  DB::table('trans_women_scheme AS t1')
                    ->select('t1.*', 't2.name')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.dmc_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        return view('dmc.women_scheme.generate_certificate', compact('data'));
    }
}