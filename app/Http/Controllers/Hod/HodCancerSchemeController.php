<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CancerScheme;

class HodCancerSchemeController extends Controller
{
    public function cancerSchemeApplicationList($status){

        $data =  DB::table('trans_cancer_scheme AS t1')
                    ->leftJoin('users AS t3', 't3.id', '=', 't1.created_by')
                    ->leftJoin('hayticha_form AS t4', 't3.id', '=', 't4.user_id')
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.hod_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get(['t1.*', 't3.category', 't4.sign_uploaded_live_certificate']);

        return view('hod.cancer_scheme.grid', compact('data', 'status'));
    }

    public function cancerSchemeApplicationView($id, $status){

        $data =  DB::table('trans_cancer_scheme AS t1')
                    ->where('t1.hod_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        $document = DB::table('trans_cancer_scheme_documents AS t1')
                        ->select('t1.*', 't2.document_name')
                        ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
                        ->whereNull('t1.deleted_at')
                        ->where('t1.cancer_id',$data->id)
                        ->get();

      return view('hod.cancer_scheme.view', compact('data', 'document'));

    }


    public function rejectCancerSchemeApplication(request $request, $id){

        $update = [
            'hod_status' => 2,
            'hod_reject_reason' => $request->get('hod_reject_reason'),
            'hod_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_hod' => Auth::user()->id,
        ];
        CancerScheme::where('id', $id)->update($update);
        return redirect('cancer_scheme_application_list/2')->with('message', 'Cancer Scheme Application Rejected by HOD Successfully');
    }

    public function approveCancerSchemeApplication(request $request, $id){

        $update = [
            'hod_status' => 1,
            'hod_approval_date' => date("Y-m-d H:i:s"),
            'hod_remark' => $request->get('remark'),
            'approve_by_hod' => Auth::user()->id,
        ];
        CancerScheme::where('id', $id)->update($update);
        return redirect('cancer_scheme_application_list/1')->with('message', 'Cancer Scheme Application Approved by HOD Successfully');
    }

    public function newsendsms($sms,$number)
    {

        $key = "kbf8IN83hIxNTVgs";
        $mbl=$number; 	/*or $mbl="XXXXXXXXXX,XXXXXXXXXX";*/
        $message=$sms;
        $message_content=urlencode($message);

        $senderid="CoreOC";	$route= 1;
        $url = "http://sms.adityahost.com/vb/apikey.php?apikey=$key&senderid=$senderid&number=$mbl&message=$message_content";

        $output = file_get_contents($url);	/*default function for push any url*/

    }
}
