<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRestisterFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role' => 'nullable',
            'name' => 'nullable',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'password' => 'nullable',
            'confirm_password' => 'nullable',

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
            'contact' => 'nullable',

        ];
    }
}
