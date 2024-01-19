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
            'user_id' => 'nullable',
            'house_no' => 'nullable',
            'area' => 'nullable',
            'landmark' => 'nullable',
            'pincode' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'contact' => 'nullable',
            'alternate_contact_no' => 'nullable',
            'bank_name' => 'required',
            'account_no' => 'required',
            'ifsc_code' => 'required',
            'signature' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'nullable',

        ];
    }
}
