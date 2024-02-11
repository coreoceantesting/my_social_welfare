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

       $scheme = DB::table('scheme_mst as t1')
                        ->select('t1.*')
                        ->leftJoin('category_mst as t2', function ($join) {
                            $join->on(DB::raw('FIND_IN_SET(t2.id, t1.category_id)'), '>', DB::raw('0'));
                        })
                        ->where('t2.id', Auth::user()->category)
                        ->whereNull('t1.deleted_at')
                        ->whereNull('t2.deleted_at')
                        ->orderBy('t1.scheme_name', 'ASC')
                        ->get();
                        

        $scheme_name = DB::table('scheme_mst as t1')
                    ->select('t1.*')
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.scheme_name', 'ASC')
                    ->get();
        
            // Hod Panel Scheme Count
       $bus_concession_scheme_count = DB::table('trans_bus_concession_scheme AS t1')
                                        ->whereNull('t1.deleted_at')
                                        ->count();

        $bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 0)
                                            ->whereNull('t1.deleted_at')
                                            ->count();    

        $bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->whereNull('t1.deleted_at')
                                            ->count();
        $bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 2)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  
        
        $disability_scheme_total_count =  DB::table('trans_disability_scheme AS t1')
                                            ->whereNull('t1.deleted_at')
                                            ->count();

        $disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
                                            ->where('t1.hod_status', '=', 0)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  

        $disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->whereNull('t1.deleted_at')
                                            ->count();

        $disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
                                            ->where('t1.hod_status', '=', 2)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  

        $education_scheme_total_count =  DB::table('trans_education_scheme AS t1')
                                            ->whereNull('t1.deleted_at') 
                                            ->count(); 
        $education_scheme_pending =  DB::table('trans_education_scheme AS t1')
                                            ->where('t1.hod_status', '=', 0)
                                            ->whereNull('t1.deleted_at') 
                                            ->count(); 
        $education_scheme_approve =  DB::table('trans_education_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->whereNull('t1.deleted_at') 
                                            ->count();
        $education_scheme_reject =  DB::table('trans_education_scheme AS t1')
                                            ->where('t1.hod_status', '=', 2)
                                            ->whereNull('t1.deleted_at') 
                                            ->count(); 
        $marriage_scheme_total_count =  DB::table('trans_marriage_scheme AS t1')
                                            ->whereNull('t1.deleted_at')
                                            ->count(); 
        $marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();   
        $marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  
        $marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();                                     
        $sports_scheme_total_count =  DB::table('trans_sports_scheme AS t1')
                                          ->whereNull('t1.deleted_at')
                                          ->count();
        $sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
                                          ->where('t1.hod_status', '=', 0)
                                          ->whereNull('t1.deleted_at')
                                          ->count(); 
        $sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
                                          ->where('t1.hod_status', '=', 1)
                                          ->whereNull('t1.deleted_at')
                                          ->count();
        $sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
                                          ->where('t1.hod_status', '=', 2)
                                          ->whereNull('t1.deleted_at')
                                          ->count();                                                                                                                                                                                                                                                                 

        $vehicle_scheme_total_count =  DB::table('trans_vehicle_scheme AS t1')
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $women_scheme_total_count =  DB::table('trans_women_scheme AS t1')
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $women_scheme_pending =  DB::table('trans_women_scheme AS t1')
                                        ->where('t1.hod_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count(); 
        $women_scheme_approve =  DB::table('trans_women_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count(); 
        $women_scheme_reject =  DB::table('trans_women_scheme AS t1')
                                        ->where('t1.hod_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  
                                        
            // AC Panel Scheme Count
        $ac_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 0)
                                            ->whereNull('t1.deleted_at')
                                            ->count();    

        $ac_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->whereNull('t1.deleted_at')
                                            ->count();
        $ac_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 2)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  

        $ac_disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  

        $ac_disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();

        $ac_disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  
       
        $ac_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 0)
                                        ->whereNull('t1.deleted_at') 
                                        ->count(); 
        $ac_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->whereNull('t1.deleted_at') 
                                        ->count();
        $ac_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 2)
                                        ->whereNull('t1.deleted_at') 
                                        ->count(); 
       
        $ac_marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 0)
                                    ->whereNull('t1.deleted_at')
                                    ->count();   
        $ac_marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->whereNull('t1.deleted_at')
                                    ->count();  
        $ac_marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 2)
                                    ->whereNull('t1.deleted_at')
                                    ->count();                                     
        
        $ac_sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 0)
                                    ->whereNull('t1.deleted_at')
                                    ->count(); 
        $ac_sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->whereNull('t1.deleted_at')
                                    ->count();
        $ac_sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 2)
                                    ->whereNull('t1.deleted_at')
                                    ->count();                                                                                                                                                                                                                                                                 

        $ac_vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 0)
                                    ->whereNull('t1.deleted_at')
                                    ->count();
        $ac_vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->whereNull('t1.deleted_at')
                                    ->count();
        $ac_vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 2)
                                    ->whereNull('t1.deleted_at')
                                    ->count();
        
        $ac_women_scheme_pending =  DB::table('trans_women_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 0)
                                    ->whereNull('t1.deleted_at')
                                    ->count(); 
        $ac_women_scheme_approve =  DB::table('trans_women_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->whereNull('t1.deleted_at')
                                    ->count(); 
        $ac_women_scheme_reject =  DB::table('trans_women_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 2)
                                    ->whereNull('t1.deleted_at')
                                    ->count(); 
                                    
          // AMC Panel Scheme Count
        $amc_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
                                                ->where('t1.hod_status', '=', 1)
                                                ->where('t1.ac_status', '=', 1)
                                                ->where('t1.amc_status', '=', 0)
                                                ->whereNull('t1.deleted_at')
                                                ->count();    

        $amc_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 1)
                                            ->whereNull('t1.deleted_at')
                                            ->count();
        $amc_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 2)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  

        $amc_disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  

        $amc_disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();

        $amc_disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  

        $amc_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 0)
                                        ->whereNull('t1.deleted_at') 
                                        ->count(); 
        $amc_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->whereNull('t1.deleted_at') 
                                        ->count();
        $amc_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 2)
                                        ->whereNull('t1.deleted_at') 
                                        ->count(); 

        $amc_marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();   
        $amc_marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  
        $amc_marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();                                     

        $amc_sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count(); 
        $amc_sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $amc_sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();                                                                                                                                                                                                                                                                 

        $amc_vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $amc_vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $amc_vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();

        $amc_women_scheme_pending =  DB::table('trans_women_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->where('t1.amc_status', '=', 0)
                                    ->whereNull('t1.deleted_at')
                                    ->count(); 
        $amc_women_scheme_approve =  DB::table('trans_women_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->where('t1.amc_status', '=', 1)
                                    ->whereNull('t1.deleted_at')
                                    ->count(); 
        $amc_women_scheme_reject =  DB::table('trans_women_scheme AS t1')
                                    ->where('t1.hod_status', '=', 1)
                                    ->where('t1.ac_status', '=', 1)
                                    ->where('t1.amc_status', '=', 2)
                                    ->whereNull('t1.deleted_at')
                                    ->count();  
        // DMC Panel Scheme Count 
        
        $dmc_bus_concession_scheme_pending = DB::table('trans_bus_concession_scheme AS t1')
                                                ->where('t1.hod_status', '=', 1)
                                                ->where('t1.ac_status', '=', 1)
                                                ->where('t1.amc_status', '=', 1)
                                                ->where('t1.dmc_status', '=', 0)
                                                ->whereNull('t1.deleted_at')
                                                ->count();    

        $dmc_bus_concession_scheme_approve = DB::table('trans_bus_concession_scheme AS t1')
                                                ->where('t1.hod_status', '=', 1)
                                                ->where('t1.ac_status', '=', 1)
                                                ->where('t1.amc_status', '=', 1)
                                                ->where('t1.dmc_status', '=', 1)
                                                ->whereNull('t1.deleted_at')
                                                ->count();
        $dmc_bus_concession_scheme_reject = DB::table('trans_bus_concession_scheme AS t1')
                                                ->where('t1.hod_status', '=', 1)
                                                ->where('t1.ac_status', '=', 1)
                                                ->where('t1.amc_status', '=', 1)
                                                ->where('t1.dmc_status', '=', 2)
                                                ->whereNull('t1.deleted_at')
                                                ->count();  

        $dmc_disability_scheme_pending =  DB::table('trans_disability_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 1)
                                            ->where('t1.dmc_status', '=', 0)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  

        $dmc_disability_scheme_approve =  DB::table('trans_disability_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 1)
                                            ->where('t1.dmc_status', '=', 1)
                                            ->whereNull('t1.deleted_at')
                                            ->count();

        $dmc_disability_scheme_reject =  DB::table('trans_disability_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 1)
                                            ->where('t1.dmc_status', '=', 2)
                                            ->whereNull('t1.deleted_at')
                                            ->count();  

        $dmc_education_scheme_pending =  DB::table('trans_education_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 1)
                                            ->where('t1.dmc_status', '=', 0)
                                            ->whereNull('t1.deleted_at') 
                                            ->count(); 
        $dmc_education_scheme_approve =  DB::table('trans_education_scheme AS t1')
                                            ->where('t1.hod_status', '=', 1)
                                            ->where('t1.ac_status', '=', 1)
                                            ->where('t1.amc_status', '=', 1)
                                            ->where('t1.dmc_status', '=', 1)
                                            ->whereNull('t1.deleted_at') 
                                            ->count();
        $dmc_education_scheme_reject =  DB::table('trans_education_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 2)
                                        ->whereNull('t1.deleted_at') 
                                        ->count(); 

        $dmc_marriage_scheme_pending =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();   
        $dmc_marriage_scheme_approve =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();  
        $dmc_marriage_scheme_reject =  DB::table('trans_marriage_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();                                     

        $dmc_sports_scheme_pending =  DB::table('trans_sports_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count(); 
        $dmc_sports_scheme_approve =  DB::table('trans_sports_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $dmc_sports_scheme_reject =  DB::table('trans_sports_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();                                                                                                                                                                                                                                                                 

        $dmc_vehicle_scheme_pending =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $dmc_vehicle_scheme_approve =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count();
        $dmc_vehicle_scheme_reject =  DB::table('trans_vehicle_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();

        $dmc_women_scheme_pending =  DB::table('trans_women_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 0)
                                        ->whereNull('t1.deleted_at')
                                        ->count(); 
        $dmc_women_scheme_approve =  DB::table('trans_women_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 1)
                                        ->whereNull('t1.deleted_at')
                                        ->count(); 
        $dmc_women_scheme_reject =  DB::table('trans_women_scheme AS t1')
                                        ->where('t1.hod_status', '=', 1)
                                        ->where('t1.ac_status', '=', 1)
                                        ->where('t1.amc_status', '=', 1)
                                        ->where('t1.dmc_status', '=', 2)
                                        ->whereNull('t1.deleted_at')
                                        ->count();


        return view('admin.dashboard', compact('scheme', 'scheme_name', 'bus_concession_scheme_count', 'bus_concession_scheme_pending', 'bus_concession_scheme_approve', 
                                    'bus_concession_scheme_reject', 'disability_scheme_total_count', 'disability_scheme_pending', 'disability_scheme_approve', 'disability_scheme_reject',
                                    'education_scheme_total_count','education_scheme_pending','education_scheme_approve','education_scheme_reject', 'marriage_scheme_total_count',
                                     'marriage_scheme_total_count','marriage_scheme_pending','marriage_scheme_approve','marriage_scheme_reject', 'sports_scheme_total_count',
                                     'sports_scheme_pending','sports_scheme_approve','sports_scheme_reject', 'vehicle_scheme_total_count', 'vehicle_scheme_pending','vehicle_scheme_approve',
                                    'vehicle_scheme_reject', 'women_scheme_total_count','women_scheme_pending', 'women_scheme_approve', 'women_scheme_reject',
                                    'ac_bus_concession_scheme_pending','ac_bus_concession_scheme_approve', 'ac_bus_concession_scheme_reject','ac_disability_scheme_pending',
                                    'ac_disability_scheme_approve','ac_disability_scheme_reject','ac_education_scheme_pending','ac_education_scheme_approve','ac_education_scheme_reject',
                                    'ac_marriage_scheme_pending','ac_marriage_scheme_approve','ac_marriage_scheme_reject','ac_sports_scheme_pending','ac_sports_scheme_approve',
                                    'ac_sports_scheme_reject','ac_vehicle_scheme_pending','ac_vehicle_scheme_approve','ac_vehicle_scheme_reject','ac_women_scheme_pending',
                                    'ac_women_scheme_approve','ac_women_scheme_reject','amc_bus_concession_scheme_pending','amc_bus_concession_scheme_approve','amc_bus_concession_scheme_reject',
                                    'amc_disability_scheme_pending','amc_disability_scheme_approve','amc_disability_scheme_reject','amc_education_scheme_pending','amc_education_scheme_approve',
                                    'amc_education_scheme_reject','amc_marriage_scheme_pending','amc_marriage_scheme_approve','amc_marriage_scheme_reject','amc_sports_scheme_pending',
                                    'amc_sports_scheme_approve','amc_sports_scheme_reject','amc_vehicle_scheme_pending','amc_vehicle_scheme_approve','amc_vehicle_scheme_reject',
                                    'amc_women_scheme_pending','amc_women_scheme_approve','amc_women_scheme_reject','dmc_bus_concession_scheme_pending','dmc_bus_concession_scheme_approve',
                                    'dmc_bus_concession_scheme_reject','dmc_disability_scheme_pending','dmc_disability_scheme_approve','dmc_disability_scheme_reject','dmc_education_scheme_pending',
                                    'dmc_education_scheme_approve','dmc_education_scheme_reject','dmc_marriage_scheme_pending','dmc_marriage_scheme_approve','dmc_marriage_scheme_reject',
                                    'dmc_sports_scheme_pending','dmc_sports_scheme_approve','dmc_sports_scheme_reject','dmc_vehicle_scheme_pending','dmc_vehicle_scheme_approve', 
                                    'dmc_vehicle_scheme_reject','dmc_women_scheme_pending','dmc_women_scheme_approve','dmc_women_scheme_reject'  
                                 ));
                                    
                                    
                                    
                                    
                                    
                                    
                                    
    }

    public function changeThemeMode()
    {
        $mode = request()->cookie('theme-mode');

        if($mode == 'dark')
            Cookie::queue('theme-mode', 'light', 43800);
        else
            Cookie::queue('theme-mode', 'dark', 43800);

        return true;
    }

    public function terms_conditions($id){

       // print_r('hii');exit;
       $terms = DB::table('terms_conditions as t1')
                    ->select('t1.rules_regulations', 't2.id')
                    ->leftjoin('scheme_mst as t2', 't2.id', '=', 't1.scheme_id')
                    ->where('t1.scheme_id', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.created_at', 'DESC')
                    ->first();

        return view('users.terms_condition', compact('terms'));

    }
}