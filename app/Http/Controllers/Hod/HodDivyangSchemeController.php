<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DisabilityApplication;
use Illuminate\Support\Facades\Auth;

class HodDivyangSchemeController extends Controller
{
    public function divyangRegistrationList($status, $type)
    {

        $data =  DB::table('trans_disability_scheme AS t1')
                    ->select('t1.*', 't2.name', 't3.sign_uploaded_live_certificate')
                    ->leftJoin('hayticha_form AS t3', 't3.h_id', '=', 't1.hayat_id')
                    ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
                    // ->leftJoin('users AS t3', 't3.id', '=', 't1.created_by')
                    // ->where(function ($query) {
                    //     $query->where('t3.category', 1)
                    //         ->orWhere('t3.category', 2);
                    // })
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.hod_status', '=', $status)
                    ->where('t1.category_id', '=', $type)
                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();

        return view('hod.divyang_scheme.grid', compact('data', 'status'));
    }

    public function divyangRegistrationView($id, $status)
    {

        $data =  DB::table('trans_disability_scheme AS t1')
            ->select('t1.*', 't2.name')
            ->leftJoin('wards AS t2', 't2.id', '=', 't1.ward_id')
            ->where('t1.hod_status', '=', $status)
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_divyang_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.divyang_id', $data->id)
            ->get();

            // dd($data);
        return view('hod.divyang_scheme.view', compact('data', 'document'));
    }

    public function rejectDivyangApplication(request $request, $id)
    {

        $update = [
            'hod_status' => 2,
            'hod_reject_reason' => $request->get('hod_reject_reason'),
            'hod_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_hod' => Auth::user()->id,
        ];
        DisabilityApplication::where('id', $id)->update($update);
        return redirect('divyang_registration_list/2/1')->with('message', 'Divyang Application Rejected by HOD Successfully');
    }

    public function approveDivyangApplication(request $request, $id)
    {

        $update = [
            'hod_status' => 1,
            'hod_approval_date' => date("Y-m-d H:i:s"),
            'hod_remark' => $request->get('remark'),
            'approve_by_hod' => Auth::user()->id,
        ];
        DisabilityApplication::where('id', $id)->update($update);
        return redirect('divyang_registration_list/1/1')->with('message', 'Divyang Application Approved by HOD Successfully');
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
