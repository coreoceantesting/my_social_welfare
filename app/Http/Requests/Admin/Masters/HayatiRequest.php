<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class HayatiRequest extends FormRequest
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
            'user_id' => 'required',
            'house_no' => 'required',
            'area' => 'required',
            'landmark' => 'required',
            'pincode' => 'required',
            'city' => 'required',
            'state' => 'required',
            'contact' => 'required',
            'alternate_contact_no' => 'required',
            'bank_name' => 'required',
            'branch_name'=> 'required',
            'account_no' => 'required',
            'ifsc_code' => 'required',
            'medical_benefit'=>'required',
            'govt_benefit'=>'required',
            'disability_benefit'=>'required',
            'signature' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required',
            'sign_uploaded_live_certificate' => 'required',
            'download_pdf'=>'required',
            'pdfPath'=> 'required'



        ];
    }
}