<?php

namespace App\Http\Controllers\Ac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BusConcession;

class AcBusConcessionSchemeController extends Controller
{
    public function busConcessionApplicationList($status){

        $data =  DB::table('trans_bus_concession_scheme AS t1')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('ac.bus_concession.grid', compact('data', 'status'));
    }

    public function busConcessionApplicationView($id, $status){

        $data =  DB::table('trans_bus_concession_scheme AS t1')
                    ->where('t1.ac_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        $document = DB::table('trans_bus_concession_scheme_documents AS t1')
                        ->select('t1.*', 't2.document_name')
                        ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
                        ->whereNull('t1.deleted_at')
                        ->where('t1.bus_concession_id',$data->id)
                        ->get();

      return view('ac.bus_concession.view', compact('data', 'document'));

    }


    public function rejectBusConcessionApplication(request $request, $id){

        $update = [
            'ac_status' => 2,
            'ac_reject_reason' => $request->get('ac_reject_reason'),
            'ac_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_ac' => Auth::user()->id,
        ];
        BusConcession::where('id', $id)->update($update);
        return redirect('ac_bus_concession_application_list/2')->with('message', 'Bus Concession Application Rejected by AC Successfully');
    }

    public function approveBusConcessionApplication(request $request, $id){

        $update = [
            'ac_status' => 1,
            'ac_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_ac' => Auth::user()->id,
        ];
        BusConcession::where('id', $id)->update($update);
        return redirect('ac_bus_concession_application_list/1')->with('message', 'Bus Concession Application Approved by AC Successfully');
    }
}
