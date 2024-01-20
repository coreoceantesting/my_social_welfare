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
                    ->select('t1.scheme_name', 't1.id')
                    ->leftjoin('category_mst as t2', 't2.id', '=', 't1.cat_id')
                    ->leftjoin('users as t3', 't3.category', '=', 't2.id')
                    ->where('t2.id', Auth::user()->category)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.created_at', 'DESC')
                    ->get();

        return view('admin.dashboard', compact('scheme'));
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
                    ->select('t1.rules_regulations')
                    ->leftjoin('scheme_mst as t2', 't2.id', '=', 't1.scheme_id')
                    ->where('t1.scheme_id', $id)
                    ->whereNull('t1.deleted_at')
                    ->orderBy('t1.created_at', 'DESC')
                    ->first();

        return view('admin.users.terms_condition', compact('terms'));

    }
}
