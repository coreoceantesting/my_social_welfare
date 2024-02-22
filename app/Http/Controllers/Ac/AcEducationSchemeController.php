<?php

namespace App\Http\Controllers\Ac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\EducationScheme;

class AcEducationSchemeController extends Controller
{
    public function eductationSchemeApplicationList(Request $request, $status)
    {

        $category = $request->input('category', null);

        $query =  DB::table('trans_education_scheme AS t1')
            ->select('t1.*')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', $status)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC');


        if (!is_null($category)) {
            if ($category == 'women') {
                $query->where('t2.category', 4);
            } elseif (in_array($category, ['1', '2'])) {
                $query->where(function ($query) use ($category) {
                    $query->where('t2.category', 1)
                        ->orWhere('t2.category', 2);
                });
            }
        }

        $data = $query->get();

        return view('ac.education_scheme.grid', compact('data', 'status'));
    }

    public function eductationSchemeApplicationView($id, $status)
    {

        $data =  DB::table('trans_education_scheme AS t1')
            ->where('t1.ac_status', '=', $status)
            ->where('t1.id', '=', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->first();

        $document = DB::table('trans_education_scheme_documents AS t1')
            ->select('t1.*', 't2.document_name')
            ->leftJoin('document_type_msts AS t2', 't2.id', '=', 't1.document_id')
            ->whereNull('t1.deleted_at')
            ->where('t1.education_id', $data->id)
            ->get();

        return view('ac.education_scheme.view', compact('data', 'document'));
    }


    public function rejectEductationSchemeApplication(request $request, $id)
    {

        $update = [
            'ac_status' => 2,
            'ac_reject_reason' => $request->get('ac_reject_reason'),
            'ac_reject_date' => date("Y-m-d H:i:s"),
            'reject_by_ac' => Auth::user()->id,
        ];
        EducationScheme::where('id', $id)->update($update);
        return redirect('ac_education_scheme_application_list/2')->with('message', 'Education Scheme Application Rejected by AC Successfully');
    }

    public function approveEducationSchemeApplication(request $request, $id)
    {

        $update = [
            'ac_status' => 1,
            'ac_approval_date' => date("Y-m-d H:i:s"),
            'approve_by_ac' => Auth::user()->id,
        ];
        EducationScheme::where('id', $id)->update($update);
        return redirect('ac_education_scheme_application_list/1')->with('message', 'Education Scheme Application Approved by AC Successfully');
    }
}
