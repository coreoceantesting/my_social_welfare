<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class allListingController extends Controller
{
    // pending apllication list
    public function pendingApplicationList()
    {
        switch (auth()->user()->roles->pluck('name')[0]) {
            case 'Ac':
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','pending')->where('ac_status','pending');
                break;
            case 'Hod':
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','pending')->where('hod_status','pending')->where('ac_status','approved');
                break;
            case 'AMC':
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','review')->where('hod_status','approved')->where('ac_status','approved')->where('amc_status','pending');
                break;
            case 'DMC':
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','review')->where('hod_status','approved')->where('ac_status','approved')->where('amc_status','approved')->where('dmc_status','pending');
                break;

            default:
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','pending')->where('overall_status','pending');
                break;
        }
        $application_list = $application_list->get();
        // dd($application_list->get()->toArray());
        $wards = DB::table('wards')->whereNull('deleted_by')->latest()->get(['name']);

        return view('users.all_education_scheme.pendingList')->with(['application_list' => $application_list, 'wards' => $wards]);
    }

    // update status
    public function changeStatus(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'status_new' => 'required',
                'remark_new' => 'required',
            ], [
                'status_new.required' => 'The status field is required.',
                'remark_new.required' => 'The remark field is required.',
            ]);

            $id = $request->input('action_model_id');

            $formDetails = DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->first();

            if (!$formDetails) {
                return response()->json(['error' => 'Form details not found.']);
            }

            switch (auth()->user()->roles->pluck('name')[0]) {
                case 'Ac':
                    if($request->input('status_new') == 'rejected')
                    {
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'ac_status' => $request->input('status_new'),
                            'ac_remark' => $request->input('remark_new'),
                            'ac_approval_date' => date('Y-m-d'),
                            'overall_status' => 'rejected'
                        ]);
                    }else{
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'ac_status' => $request->input('status_new'),
                            'ac_remark' => $request->input('remark_new'),
                            'ac_approval_date' => date('Y-m-d'),
                        ]);
                    }
                    break;
                case 'Hod':
                    if($request->input('status_new') == 'rejected')
                    {
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'hod_status' => $request->input('status_new'),
                            'hod_remark' => $request->input('remark_new'),
                            'hod_approval_date' => date('Y-m-d'),
                            'overall_status' => 'rejected'
                        ]);
                    }else{
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'hod_status' => $request->input('status_new'),
                            'hod_remark' => $request->input('remark_new'),
                            'hod_approval_date' => date('Y-m-d'),
                            'overall_status' => 'review'
                        ]);
                    }
                    break;
                case 'AMC':
                    if($request->input('status_new') == 'rejected')
                    {
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'amc_status' => $request->input('status_new'),
                            'amc_remark' => $request->input('remark_new'),
                            'amc_approval_date' => date('Y-m-d'),
                            'overall_status' => 'rejected'
                        ]);
                    }else{
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'amc_status' => $request->input('status_new'),
                            'amc_remark' => $request->input('remark_new'),
                            'amc_approval_date' => date('Y-m-d'),
                        ]);
                    }
                    break;
                case 'DMC':
                    if($request->input('status_new') == 'rejected')
                    {
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'dmc_status' => $request->input('status_new'),
                            'dmc_remark' => $request->input('remark_new'),
                            'dmc_approval_date' => date('Y-m-d'),
                            'overall_status' => 'rejected'
                        ]);
                    }else{
                        DB::table('all_education_scheme_details')->where('all_education_scheme_detail_id', $id)->update([
                            'dmc_status' => $request->input('status_new'),
                            'dmc_remark' => $request->input('remark_new'),
                            'dmc_approval_date' => date('Y-m-d'),
                            'overall_status' => 'approved'
                        ]);
                    }
                    break;
            }



            return response()->json(['success' => 'Form Status Updated successfully!']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()]);
        }
    }

    // approved List
    public function approvedApplicationList()
    {
        switch (auth()->user()->roles->pluck('name')[0]) {
            case 'Ac':
                $application_list = DB::table('all_education_scheme_details')->where('ac_status','approved');
                break;
            case 'Hod':
                $application_list = DB::table('all_education_scheme_details')->where('hod_status','approved');
                break;
            case 'AMC':
                $application_list = DB::table('all_education_scheme_details')->where('amc_status','approved');
                break;
            case 'DMC':
                $application_list = DB::table('all_education_scheme_details')->where('dmc_status','approved');
                break;

            default:
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','approved');
                break;
        }
        $application_list = $application_list->get();
        $wards = DB::table('wards')->whereNull('deleted_by')->latest()->get(['name']);

        return view('users.all_education_scheme.approvedList')->with(['application_list' => $application_list, 'wards' => $wards]);
    }

    // rejected list
    public function rejectedApplicationList()
    {
        switch (auth()->user()->roles->pluck('name')[0]) {
            case 'Ac':
                $application_list = DB::table('all_education_scheme_details')->where('hod_status','rejected')->orWhere('overall_status','rejected');
                break;
            case 'Hod':
                $application_list = DB::table('all_education_scheme_details')->where('ac_status','rejected')->orWhere('overall_status','rejected');
                break;
            case 'AMC':
                $application_list = DB::table('all_education_scheme_details')->where('amc_status','rejected')->orWhere('overall_status','rejected');
                break;
            case 'DMC':
                $application_list = DB::table('all_education_scheme_details')->where('dmc_status','rejected')->orWhere('overall_status','rejected');
                break;

            default:
                $application_list = DB::table('all_education_scheme_details')->where('overall_status','rejected');
                break;
        }
        $application_list = $application_list->get();
        $wards = DB::table('wards')->whereNull('deleted_by')->latest()->get(['name']);

        return view('users.all_education_scheme.rejectedList')->with(['application_list' => $application_list, 'wards' => $wards]);
    }

}
