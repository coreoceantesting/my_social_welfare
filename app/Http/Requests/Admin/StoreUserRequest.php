<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'mobile' => 'required|unique:users,mobile|digits:10',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',

            'f_name' => 'nullable',
            'm_name' => 'nullable',
            'l_name' => 'nullable',
            'gender' => 'nullable',
            'dob' => 'nullable',
            'Age' => 'nullable',
            'father_fname' => 'nullable',
            'father_mname' => 'nullable',
            'father_lname' => 'nullable',
            'mother_name' => 'nullable',
            'category' => 'nullable',
            'contact' => 'nullable',
        ];
    }
}
