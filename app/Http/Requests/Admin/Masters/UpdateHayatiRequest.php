<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHayatiRequest extends FormRequest
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
            'h_id' => 'nullable',
            'user_id' => 'nullable',
            'house_no' => 'nullable',
            'area' => 'nullable',
            'landmark' => 'nullable',
            'pincode' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'contact' => 'nullable',
            'alternate_contact_no' => 'nullable',
            'bank_name' => 'nullable',
            'account_no' => 'nullable',
            'ifsc_code' => 'nullable',
            'signature' => 'nullable',
            'status' => 'nullable',
            'sign_uploaded_live_certificate' => 'nullable',

        ];
    }
}
