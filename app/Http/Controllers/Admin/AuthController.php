<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreRestisterFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use App\Models\CategoryMst;
use Illuminate\Support\Arr;


class AuthController extends Controller
{

    public function showLogin()
    {
        $quotes = [];
        for($i=1; $i<=3; $i++)
        {
            array_push($quotes, Inspiring::quote());
        }

        return view('admin.auth.login')->with(['quotes' => $quotes]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Please enter username',
            'password.required' => 'Please enter password',
        ]);

        if ($validator->passes())
        {
            $username = $request->username;
            $password = $request->password;
            $remember_me = $request->has('remember_me') ? true : false;

            try
            {
                $user = User::where('email', $username)->orWhere('name', $username)->first();

                if(!$user)
                    return response()->json(['error2'=> 'No user found with this username']);

                if($user->active_status == '0' && !$user->roles)
                    return response()->json(['error2'=> 'You are not authorized to login, contact HOD']);

                $userType = '';
                if( $user->hasRole(['User']) )
                {
                    $userType = 'user';
                    if(!auth()->attempt(['name' => $username, 'password' => $password], $remember_me))
                        return response()->json(['error2'=> 'Your entered credentials are invalid']);
                }
                else if(!auth()->attempt(['email' => $username, 'password' => $password], $remember_me))
                    return response()->json(['error2'=> 'Your entered credentials are invalid']);


                return response()->json(['success'=> 'login successful', 'user_type'=> $userType ]);
            }
            catch(\Exception $e)
            {
                DB::rollBack();
                Log::info("login error:". $e);
                return response()->json(['error2'=> 'Something went wrong while validating your credentials!']);
            }
        }
        else
        {
            return response()->json(['error'=>$validator->errors()]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }


    public function showChangePassword()
    {
        return view('admin.auth.change-password');
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->passes())
        {
            $old_password = $request->old_password;
            $password = $request->password;

            try
            {
                $user = DB::table('users')->where('id', $request->user()->id)->first();

                if( Hash::check($old_password, $user->password) )
                {
                    DB::table('users')->where('id', $request->user()->id)->update(['password'=> Hash::make($password)]);

                    return response()->json(['success'=> 'Password changed successfully!']);
                }
                else
                {
                    return response()->json(['error2'=> 'Old password does not match']);
                }
            }
            catch(\Exception $e)
            {
                DB::rollBack();
                Log::info("password change error:". $e);
                return response()->json(['error2'=> 'Something went wrong while changing your password!']);
            }
        }
        else
        {
            return response()->json(['error'=>$validator->errors()]);
        }
    }

    public function showRegister()
    {
        $category = CategoryMst::latest()->get();
        return view('admin.auth.register')->with(['category'=> $category]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'Age' => 'required',
            'father_fname' => 'required',
            'father_mname' => 'required',
            'father_lname' => 'required',
            'mother_name' => 'required',
            'category' => 'required',
            'mobile' => 'required',
            'name' =>'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ],
        [
            'f_name.required' => 'Please enter first Name',
            'm_name.required' => 'Please enter Middle Name',
            'l_name.required' => 'Please enter Last Name',
            'gender.required' => 'Please Select Gender',
            'dob.required' => 'Please enter Date of Birth',
            'Age.required' => 'Please enter Age',
            'father_fname.required' => 'Please enter Father First Name',
            'father_mname.required' => 'Please enter Father Middle Name',
            'father_lname.required' => 'Please enter Father Last Name',
            'mother_name.required' => 'Please enter Mother Name',
            'category.required' => 'Please Select Category',
            'mobile.required' => 'Please enter Contact Number',
            'name.required' => 'Please enter Username',
            'password.required' => 'Please enter Password',
            'confirm_password' => 'Please enter Confirm Password',
        ]);

        if ($validator->passes())
        {
            $f_name = $request->f_name;
            $m_name = $request->m_name;
            $l_name = $request->l_name;
            $gender = $request->gender;
            $dob    = $request->dob;
            $Age    = $request->Age;
            $father_fname = $request->father_fname;
            $father_mname = $request->father_mname;
            $father_lname = $request->father_lname;
            $mother_name = $request->mother_name;
            $category = $request->category;
            $mobile = $request->mobile;
            $name = $request->name;
            $password =  Hash::make($request->password);

            try
            {

                $User = new User();
                $User->f_name = $request->f_name;
                $User->m_name = $request->m_name;
                $User->l_name = $request->l_name;
                $User->gender = $request->gender;
                $User->dob    = $request->dob;
                $User->Age    = $request->Age;
                $User->father_fname = $request->father_fname;
                $User->father_mname = $request->father_mname;
                $User->father_lname = $request->father_lname;
                $User->mother_name = $request->mother_name;
                $User->category = $request->category;
                $User->mobile = $request->mobile;
                $User->contact = $request->mobile;
                $User->name = $request->name;
                $User->password =  Hash::make($request->password);


                $User->save();

                $newRecordId = $User->id;

                $role = Role::where('name', 'User')->first();
                $id = $role->id;

                DB::table('model_has_roles')->insert(['role_id'=> $id, 'model_type'=> 'App\Models\User', 'model_id'=> $newRecordId]);
                DB::commit();
                    return response()->json(['success'=> 'Register Data Added successfully!']);

            }
            catch(\Exception $e)
            {
                DB::rollBack();
                Log::info("Register error:". $e);
                return response()->json(['error2'=> 'Something went wrong while validating your credentials!']);
            }
        }
        else
        {
            return response()->json(['error'=>$validator->errors()]);
        }

    }


}
