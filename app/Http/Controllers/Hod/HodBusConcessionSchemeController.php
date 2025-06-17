<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BusConcession;

class HodBusConcessionSchemeController extends Controller
{
    public function busConcessionApplicationList(Request $request, $status)
    {
        $category = $request->input('category', null);

        // $query = DB::table('trans_bus_concession_scheme AS t1')
        //     ->select('t1.*', 't2.category', 't4.sign_uploaded_live_certificate')
        //     ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
        //     ->leftJoin('hayticha_form AS t4', 't2.id', '=', 't4.user_id')
        //     ->where('t1.hod_status', '=', $status)
        //     ->whereNull('t1.deleted_at')
        //     ->orderBy('t1.id', 'DESC');

        $sub = DB::table('hayticha_form')
            ->select('user_id', 'sign_uploaded_live_certificate')
            ->whereRaw('h_id = (SELECT MAX(h_id) FROM hayticha_form AS sub WHERE sub.user_id = hayticha_form.user_id)');

        $query = DB::table('trans_bus_concession_scheme AS t1')
            ->select('t1.*', 't2.category', 't4.sign_uploaded_live_certificate')
            ->join('users AS t2', 't2.id', '=', 't1.created_by')
            ->leftJoinSub($sub, 't4', 't2.id', '=', 't4.user_id')
            ->whereNotNull('t4.sign_uploaded_live_certificate')
            ->where('t1.hod_status', '=', $status)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC');

        if (!is_null($category)) {
            if ($category == 'women') {
                $query->where('t2.category', 4);
            } elseif ($category == 'seniorCitizen') {
                $query->where('t2.category', 3);
            } elseif (in_array($category, ['1', '2'])) {
                $query->where(function ($query) use ($category) {
                    $query->where('t2.category', 1)
                        ->orWhere('t2.category', 2);
                });
            }
        }

        $data = $query->get();
        return view('hod.bus_concession.grid', compact('data', 'status'));
    }



    public function busConcessionApplicationView($id, $status)
    {
        $data =  DB::table('trans_bus_concession_scheme AS t1')
            ->where('t1.hod_status', '=', $status)
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        // dd($data);
        $document = DB::table('trans_bus_concession_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.bus_concession_id', $data->id)
            ->get();

        return view('hod.bus_concession.view', compact('data', 'document'));
    }


    public function rejectBusConcessionApplication(request $request, $id)
    {

        $update = [
            'hod_status' => 2,
            'hod_reject_reason' => $request->get('hod_reject_reason'),
            'hod_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_hod' => Auth::user()->id,
        ];
        BusConcession::where('id', $id)->update($update);
        return redirect('bus_concession_application_list/2')->with('message', 'Bus Concession Application Rejected by HOD Successfully');
    }

    public function approveBusConcessionApplication(request $request, $id)
    {

        $update = [
            'hod_status' => 1,
            'hod_approval_date' => date("Y-m-d H:i:s"),
            'hod_remark' => $request->get('remark'),
            'approve_by_hod' => Auth::user()->id,
        ];
        BusConcession::where('id', $id)->update($update);
        return redirect('bus_concession_application_list/1')->with('message', 'Bus Concession Application Approved by HOD Successfully');
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
