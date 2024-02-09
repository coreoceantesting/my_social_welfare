<?php

namespace App\Http\Controllers\Ac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\WomenScheme;

class AcWomenSchemeController extends Controller
{
    public function womenSchemeApplicationList($status){

        $data =  DB::table('trans_women_scheme AS t1')
                    ->select('t1.*', 't2.name')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('ac.women_scheme.grid', compact('data', 'status'));
    }

    public function womenSchemeApplicationView($id, $status){

        $data =  DB::table('trans_women_scheme AS t1')
                    ->select('t1.*', 't2.name')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    ->where('t1.ac_status', '=', $status)
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

      return view('ac.women_scheme.view', compact('data', 'document'));

    }


    public function rejectWomenSchemeApplication(request $request, $id){

        $update = [
            'ac_status' => 2,
            'ac_reject_reason' => $request->get('ac_reject_reason'),
            'ac_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_ac' => Auth::user()->id,
        ];
        WomenScheme::where('id', $id)->update($update);
        return redirect('ac_women_scheme_application_list/2')->with('message', 'Women Sewing/Beautisians Scheme Application Rejected by AC Successfully');
    }

    public function approveWomenSchemeApplication(request $request, $id){

        $update = [
            'ac_status' => 1,
            'ac_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_ac' => Auth::user()->id,
        ];
        WomenScheme::where('id', $id)->update($update);
        return redirect('ac_women_scheme_application_list/1')->with('message', 'Women Sewing/Beautisians Scheme Application Approved by AC Successfully');
    }
}