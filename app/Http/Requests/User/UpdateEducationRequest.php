<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'full_name'=>'required',
            'full_address'=>'required',
            'dob'=>'required',
            'age'=>'required',
            'contact'=>'required',
            'email'=>'required|email',
            'family_name'=>'required',
            'beneficiary_relationship'=>'required',
            'total_family'=>'required',
            // 'admission_certificate'=>'nullable',
            // 'residence_proof'=>'nullable',
            // 'income_certificate'=>'nullable',
            // 'academic_certificate'=>'nullable',
            // 'passbook_copy'=>'nullable',
            // 'adhaar_no'=>'required',
            // 'adhaar_copy'=>'nullable',
            // 'recommendation_letter'=>'nullable',
            // 'signature'=>'nullable',
            // 'profile'=>'nullable',
        ];
    }
}