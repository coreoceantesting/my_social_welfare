<?php

namespace App\Http\Controllers\Dmc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CancerScheme;

class DmcCancerSchemeController extends Controller
{
    public function cancerSchemeApplicationList($status){

        $data =  DB::table('trans_cancer_scheme AS t1')
                    ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
                    ->leftJoin('hayticha_form AS t4', 't2.id', '=', 't4.user_id')
                    ->where('t1.hod_status', '=', 1)
                    ->where('t1.ac_status', '=', 1)
                    ->where('t1.amc_status', '=', 1)
                    ->where('t1.dmc_status', '=', $status)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get(['t1.*', 't2.category', 't4.sign_uploaded_live_certificate']);

        return view('dmc.cancer_scheme.grid', compact('data', 'status'));
    }

    public function cancerSchemeApplicationView($id, $status){

        $data =  DB::table('trans_cancer_scheme AS t1')
                    ->where('t1.dmc_status', '=', $status)
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

      return view('dmc.cancer_scheme.view', compact('data', 'document'));

    }


    public function rejectCancerSchemeApplication(request $request, $id){

        $update = [
            'dmc_status' => 2,
            'dmc_reject_reason' => $request->get('dmc_reject_reason'),
            'dmc_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_dmc' => Auth::user()->id,
        ];
        CancerScheme::where('id', $id)->update($update);
        return redirect('dmc_cancer_scheme_application_list/2')->with('message', 'Cancer Scheme Application Rejected by DMC Successfully');
    }

    public function approveCancerSchemeApplication(request $request, $id){

        if ($request->hasFile('dmc_sign')) {
            $imagePath = $request->file('dmc_sign')->store('cancer_scheme_file/dmc_sign', 'public');
        }

        $update = [
            'dmc_status' => 1,
            'dmc_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_dmc' => Auth::user()->id,
            'dmc_sign'=>$imagePath
        ];
        CancerScheme::where('id', $id)->update($update);
        return redirect('dmc_cancer_scheme_application_list/1')->with('message', 'Cancer Scheme Application Approved by DMC Successfully');
    }

    public function generateCertificate($id, $status){

        $data =  DB::table('trans_cancer_scheme AS t1')
                    ->where('t1.dmc_status', '=', $status)
                    ->where('t1.id', '=', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->first();

        return view('dmc.cancer_scheme.generate_certificate', compact('data'));
    }
}