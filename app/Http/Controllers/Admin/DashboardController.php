<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\SchemeMst;
use App\Models\TermsAndConditionsMst;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        $scheme = DB::table('mst_scheme as t1')
            ->select('t1.*')
            ->leftJoin('category_wise_scheme as t3', 't3.scheme_id', '=', 't1.id')
            ->leftJoin('category_mst as t2', function ($join) {
                $join->on(DB::raw('FIND_IN_SET(t2.id, t3.category_id)'), '>', DB::raw('0'));
            })
            ->where('t2.id', Auth::user()->category)
            ->whereNull('t1.deleted_at')
            ->whereNull('t2.deleted_at')
            ->whereNull('t3.deleted_at')
            ->orderBy('t1.scheme_name', 'ASC')
            ->get();

        // dd($scheme);

        // $scheme_name = DB::table('mst_scheme as t1')
        //     ->select('t1.*')
        //     ->whereNull('t1.deleted_at')
        //     ->orderBy('t1.scheme_name', 'ASC')
        //     ->get();

        // Hod Panel Scheme Count
        // divyang counting
        $bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->whereNull('t1.deleted_at')
            ->count();


        $bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();


        $bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();


        $disability_scheme_total_count =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->whereNull('t1.deleted_at')
            ->count();
            
            $disability_scheme_total_count_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->whereNull('t1.deleted_at')
            ->count();

        $disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
            
        $disability_scheme_pending_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $disability_scheme_approve_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
			->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
            
        $disability_scheme_reject_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
			->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->whereNull('t1.deleted_at')
            ->count();
        $education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $marriage_scheme_total_count =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->whereNull('t1.deleted_at')
            ->count();
        $marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Women and Child walfare counting

        $women_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->whereNull('t1.deleted_at')
            ->count();

        $women_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $women_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $women_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->whereNull('t1.deleted_at')
            ->count();

        $women_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $sports_scheme_total_count =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->whereNull('t1.deleted_at')
            ->count();
        $sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $vehicle_scheme_total_count =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->whereNull('t1.deleted_at')
            ->count();
        $vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_scheme_total_count =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_scheme_pending =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_scheme_approve =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $women_scheme_reject =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $cancer_scheme_total_count =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->whereNull('t1.deleted_at')
            ->count();

        $cancer_scheme_pending =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $cancer_scheme_approve =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $cancer_scheme_reject =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Senior  Citizen counting
        $senior_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->whereNull('t1.deleted_at')
            ->count();
        $senior_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $senior_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $senior_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();


        // AC Panel Scheme Count

        // divyang counting
        $ac_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();


        $ac_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();


        $ac_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();


        $ac_disability_scheme_total_count =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
            
        // new
        $ac_disability_scheme_total_count_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_disability_scheme_pending_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_disability_scheme_approve_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_disability_scheme_reject_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_marriage_scheme_total_count =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Women and Child walfare counting

        $ac_women_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_women_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_women_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_women_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_women_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_sports_scheme_total_count =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)

            ->whereNull('t1.deleted_at')
            ->count();
        $ac_sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_vehicle_scheme_total_count =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_scheme_total_count =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_scheme_pending =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_scheme_approve =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_women_scheme_reject =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_cancer_scheme_total_count =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_cancer_scheme_pending =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_cancer_scheme_approve =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_cancer_scheme_reject =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Senior  Citizen counting
        $ac_senior_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_senior_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $ac_senior_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $ac_senior_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        // AMC Panel Scheme Count
        // divyang counting
        $amc_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();


        $amc_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();


        $amc_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();


        $amc_disability_scheme_total_count =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
            
            // new
            $amc_disability_scheme_total_count_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
			->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_disability_scheme_pending_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
			->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_disability_scheme_approve_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
			->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_disability_scheme_reject_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
			->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_marriage_scheme_total_count =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Women and Child walfare counting

        $amc_women_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_women_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_women_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_women_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_women_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_sports_scheme_total_count =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_vehicle_scheme_total_count =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_scheme_total_count =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_scheme_pending =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_scheme_approve =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_women_scheme_reject =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_cancer_scheme_total_count =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_cancer_scheme_pending =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_cancer_scheme_approve =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_cancer_scheme_reject =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Senior  Citizen counting
        $amc_senior_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_senior_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $amc_senior_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $amc_senior_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // DMC Panel Scheme Count


        // divyang counting
        $dmc_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();


        $dmc_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();


        $dmc_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();


        $dmc_disability_scheme_total_count =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '1')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
            
            $dmc_disability_scheme_total_count_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_disability_scheme_pending_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_disability_scheme_approve_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_disability_scheme_reject_new =  DB::table('trans_disability_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.category_id', '=', '2')
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_marriage_scheme_total_count =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where(function ($query) {
                $query->where('t2.category', 1)
                    ->orWhere('t2.category', 2);
            })
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Women and Child walfare counting

        $dmc_women_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_women_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_women_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_women_education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_women_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_sports_scheme_total_count =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_vehicle_scheme_total_count =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_scheme_total_count =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_scheme_pending =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_scheme_approve =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_women_scheme_reject =  DB::table('trans_women_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_cancer_scheme_total_count =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_cancer_scheme_pending =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_cancer_scheme_approve =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_cancer_scheme_reject =  DB::table('trans_cancer_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 4)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();
        // Senior  Citizen counting
        $dmc_senior_bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_senior_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 0)
            ->whereNull('t1.deleted_at')
            ->count();
        $dmc_senior_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 1)
            ->whereNull('t1.deleted_at')
            ->count();

        $dmc_senior_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
            ->leftJoin('users AS t2', 't2.id', '=', 't1.created_by')
            ->where('t2.category', 3)
            ->where('t1.hod_status', '=', 1)
            ->where('t1.ac_status', '=', 1)
            ->where('t1.amc_status', '=', 1)
            ->where('t1.dmc_status', '=', 2)
            ->whereNull('t1.deleted_at')
            ->count();




        return view('admin.dashboard', compact(
            'scheme',
            'bus_concession_scheme_count',
            'disability_scheme_total_count',

            'education_scheme_total_count',
            'marriage_scheme_total_count',
            'women_education_scheme_total_count',
            'women_education_scheme_total_count',
            'sports_scheme_total_count',
            'vehicle_scheme_total_count',
            'women_scheme_total_count',
            'women_bus_concession_scheme_count',
            'cancer_scheme_total_count',
            'senior_bus_concession_scheme_count',
            'bus_concession_scheme_pending',
            'bus_concession_scheme_approve',
            'bus_concession_scheme_reject',
            'disability_scheme_pending',
            'disability_scheme_approve',
            'disability_scheme_reject',
            'education_scheme_pending',
            'education_scheme_approve',
            'education_scheme_reject',
            'marriage_scheme_pending',
            'marriage_scheme_approve',
            'marriage_scheme_reject',
            'women_bus_concession_scheme_pending',
            'women_bus_concession_scheme_approve',
            'women_bus_concession_scheme_reject',
            'women_education_scheme_pending',
            'women_education_scheme_approve',
            'women_education_scheme_reject',
            'sports_scheme_pending',
            'sports_scheme_approve',
            'sports_scheme_reject',
            'vehicle_scheme_pending',
            'vehicle_scheme_approve',
            'vehicle_scheme_reject',
            'women_scheme_pending',
            'women_scheme_approve',
            'women_scheme_reject',
            'cancer_scheme_pending',
            'cancer_scheme_approve',
            'cancer_scheme_reject',
            'senior_bus_concession_scheme_pending',
            'senior_bus_concession_scheme_approve',
            'senior_bus_concession_scheme_reject',

            'ac_bus_concession_scheme_count',
            'ac_bus_concession_scheme_pending',
            'ac_bus_concession_scheme_approve',
            'ac_bus_concession_scheme_reject',
            'ac_disability_scheme_total_count',
            'ac_disability_scheme_pending',
            'ac_disability_scheme_approve',
            'ac_disability_scheme_reject',
            'ac_education_scheme_total_count',
            'ac_education_scheme_pending',
            'ac_education_scheme_approve',
            'ac_education_scheme_reject',
            'ac_marriage_scheme_total_count',
            'ac_marriage_scheme_pending',
            'ac_marriage_scheme_approve',
            'ac_marriage_scheme_reject',
            'ac_women_bus_concession_scheme_count',
            'ac_women_bus_concession_scheme_pending',
            'ac_women_bus_concession_scheme_approve',
            'ac_women_bus_concession_scheme_reject',
            'ac_women_education_scheme_total_count',
            'ac_women_education_scheme_pending',
            'ac_women_education_scheme_approve',
            'ac_women_education_scheme_reject',
            'ac_sports_scheme_total_count',
            'ac_sports_scheme_pending',
            'ac_sports_scheme_approve',
            'ac_sports_scheme_reject',
            'ac_vehicle_scheme_total_count',
            'ac_vehicle_scheme_pending',
            'ac_vehicle_scheme_approve',
            'ac_vehicle_scheme_reject',
            'ac_women_scheme_total_count',
            'ac_women_scheme_pending',
            'ac_women_scheme_approve',
            'ac_women_scheme_reject',
            'ac_cancer_scheme_total_count',
            'ac_cancer_scheme_pending',
            'ac_cancer_scheme_approve',
            'ac_cancer_scheme_reject',
            'ac_senior_bus_concession_scheme_count',
            'ac_senior_bus_concession_scheme_pending',
            'ac_senior_bus_concession_scheme_approve',
            'ac_senior_bus_concession_scheme_reject',

            'amc_bus_concession_scheme_count',
            'amc_bus_concession_scheme_pending',
            'amc_bus_concession_scheme_approve',
            'amc_bus_concession_scheme_reject',
            'amc_disability_scheme_total_count',
            'amc_disability_scheme_pending',
            'amc_disability_scheme_approve',
            'amc_disability_scheme_reject',
            'amc_education_scheme_total_count',
            'amc_education_scheme_pending',
            'amc_education_scheme_approve',
            'amc_education_scheme_reject',
            'amc_marriage_scheme_total_count',
            'amc_marriage_scheme_pending',
            'amc_marriage_scheme_approve',
            'amc_marriage_scheme_reject',
            'amc_women_bus_concession_scheme_count',
            'amc_women_bus_concession_scheme_pending',
            'amc_women_bus_concession_scheme_approve',
            'amc_women_bus_concession_scheme_reject',
            'amc_women_education_scheme_total_count',
            'amc_women_education_scheme_pending',
            'amc_women_education_scheme_approve',
            'amc_women_education_scheme_reject',
            'amc_sports_scheme_total_count',
            'amc_sports_scheme_pending',
            'amc_sports_scheme_approve',
            'amc_sports_scheme_reject',
            'amc_vehicle_scheme_total_count',
            'amc_vehicle_scheme_pending',
            'amc_vehicle_scheme_approve',
            'amc_vehicle_scheme_reject',
            'amc_women_scheme_total_count',
            'amc_women_scheme_pending',
            'amc_women_scheme_approve',
            'amc_women_scheme_reject',
            'amc_cancer_scheme_total_count',
            'amc_cancer_scheme_pending',
            'amc_cancer_scheme_approve',
            'amc_cancer_scheme_reject',
            'amc_senior_bus_concession_scheme_count',
            'amc_senior_bus_concession_scheme_pending',
            'amc_senior_bus_concession_scheme_approve',
            'amc_senior_bus_concession_scheme_reject',

            'dmc_bus_concession_scheme_count',
            'dmc_bus_concession_scheme_pending',
            'dmc_bus_concession_scheme_approve',
            'dmc_bus_concession_scheme_reject',
            'dmc_disability_scheme_total_count',
            'dmc_disability_scheme_pending',
            'dmc_disability_scheme_approve',
            'dmc_disability_scheme_reject',
            'dmc_education_scheme_total_count',
            'dmc_education_scheme_pending',
            'dmc_education_scheme_approve',
            'dmc_education_scheme_reject',
            'dmc_marriage_scheme_total_count',
            'dmc_marriage_scheme_pending',
            'dmc_marriage_scheme_approve',
            'dmc_marriage_scheme_reject',
            'dmc_women_bus_concession_scheme_count',
            'dmc_women_bus_concession_scheme_pending',
            'dmc_women_bus_concession_scheme_approve',
            'dmc_women_bus_concession_scheme_reject',
            'dmc_women_education_scheme_total_count',
            'dmc_women_education_scheme_pending',
            'dmc_women_education_scheme_approve',
            'dmc_women_education_scheme_reject',
            'dmc_sports_scheme_total_count',
            'dmc_sports_scheme_pending',
            'dmc_sports_scheme_approve',
            'dmc_sports_scheme_reject',
            'dmc_vehicle_scheme_total_count',
            'dmc_vehicle_scheme_pending',
            'dmc_vehicle_scheme_approve',
            'dmc_vehicle_scheme_reject',
            'dmc_women_scheme_total_count',
            'dmc_women_scheme_pending',
            'dmc_women_scheme_approve',
            'dmc_women_scheme_reject',
            'dmc_cancer_scheme_total_count',
            'dmc_cancer_scheme_pending',
            'dmc_cancer_scheme_approve',
            'dmc_cancer_scheme_reject',
            'dmc_senior_bus_concession_scheme_count',
            'dmc_senior_bus_concession_scheme_pending',
            'dmc_senior_bus_concession_scheme_approve',
            'dmc_senior_bus_concession_scheme_reject',
            'disability_scheme_pending_new',
            'disability_scheme_total_count_new',
            'disability_scheme_approve_new',
            'disability_scheme_reject_new',
            'ac_disability_scheme_total_count_new',
            'ac_disability_scheme_pending_new',
            'ac_disability_scheme_approve_new',
            'ac_disability_scheme_reject_new',
            'amc_disability_scheme_total_count_new',
            'amc_disability_scheme_pending_new',
            'amc_disability_scheme_approve_new',
            'amc_disability_scheme_reject_new',
            'dmc_disability_scheme_total_count_new',
            'dmc_disability_scheme_pending_new',
            'dmc_disability_scheme_approve_new',
            'dmc_disability_scheme_reject_new'
        ));
    }

    public function changeThemeMode()
    {
        $mode = request()->cookie('theme-mode');

        if ($mode == 'dark')
            Cookie::queue('theme-mode', 'light', 43800);
        else
            Cookie::queue('theme-mode', 'dark', 43800);

        return true;
    }

    public function terms_conditions($id,$scheme_name)
    {

        // print_r('hii');exit;
        $terms = DB::table('terms_conditions as t1')
            ->select('t1.rules_regulations', 't2.id', 't2.scheme_name')
            ->leftjoin('mst_scheme as t2', 't2.id', '=', 't1.scheme_id')
            ->where('t1.scheme_id', $id)
            ->whereNull('t1.deleted_at')
            ->orderBy('t1.created_at', 'DESC')
            ->first();
            if (isset($terms->id)) {
                session(['scheme_id' => $terms->id]);
            }

        return view('users.terms_condition', compact('terms'));
    }
}