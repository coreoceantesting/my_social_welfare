<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Admin\Controller;

use App\Http\Requests\Admin\Masters\HayatiRequest;
use App\Models\HayatFormModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DivyangController extends Controller
{
    public function index()
    {

        $users = User::where('id', Auth::user()->id)->first();
        return view('admin.masters.divyagform')->with(['users'=> $users]);
    }

    public function store(HayatiRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();

            if ($request->hasFile('signature')) {
                $imagePath = $request->file('signature')->store('signature', 'public');
                $input['signature'] = $imagePath;
            }

            HayatFormModel::create( Arr::only( $input, HayatFormModel::getFillables() ) );
            DB::commit();
            // $users = User::where('id', Auth::user()->id)->first();
            return response()->json(['success' => 'Haytich Form submitted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'Hayat Form');
        }
    }

    public function show($id)
{
        // $hayat = HayatFormModel::where('user_id', Auth::user()->id)->first();
        $hayat = HayatFormModel::join('users', 'hayticha_form.user_id', '=', 'users.id')
                    ->where('hayticha_form.user_id', Auth::user()->id)
                    ->select('hayticha_form.*', 'users.*') // Adjust column_name
                    ->first();

        return view('admin.masters.divyagformpdf')->with(['hayat'=> $hayat]);
}

    // public function hayatpdfdownload(Request $request){

    //     $hayat = HayatFormModel::where('user_id', Auth::user()->id)->first();
    //     return view('admin.masters.divyagformpdf')->with(['hayat'=> $hayat]);

    // }
}
