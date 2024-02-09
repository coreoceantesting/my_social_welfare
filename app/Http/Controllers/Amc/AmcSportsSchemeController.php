<?php

namespace App\Http\Controllers\Amc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SportsScheme;

class AmcSportsSchemeController extends Controller
{
    public function sportsSchemeApplicationList($status){

        $data =  DB::table('trans_sports_scheme AS t1')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.amc_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('amc.sports_scheme.grid', compact('data', 'status'));
    }

    public function sportsSchemeApplicationView($id, $status){

        $data =  DB::table('trans_sports_scheme AS t1')
                    ->where('t1.amc_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        $document = DB::table('trans_sports_scheme_documents AS t1')
                        ->select('t1.*', 't2.document_name')
                        ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
                        ->whereNull('t1.deleted_at')
                        ->where('t1.sports_id',$data->id)
                        ->get();

      return view('amc.sports_scheme.view', compact('data', 'document'));

    }


    public function rejectSportsSchemeApplication(request $request, $id){

        $update = [
            'amc_status' => 2,
            'amc_reject_reason' => $request->get('amc_reject_reason'),
            'amc_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_amc' => Auth::user()->id,
        ];
        SportsScheme::where('id', $id)->update($update);
        return redirect('amc_sports_scheme_application_list/2')->with('message', 'Sports Scheme Application Rejected by AMC Successfully');
    }

    public function approveSportsSchemeApplication(request $request, $id){

        $update = [
            'amc_status' => 1,
            'amc_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_amc' => Auth::user()->id,
        ];
        SportsScheme::where('id', $id)->update($update);
        return redirect('amc_sports_scheme_application_list/1')->with('message', 'Sports Scheme Application Approved by AMC Successfully');
    }
}