<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
        // 'admission_certificate'=>'required',
        // 'residence_proof'=>'required',
        // 'income_certificate'=>'required',
        // 'academic_certificate'=>'required',
        // 'passbook_copy'=>'required',
        'adhaar_no'=>'required',
        // 'adhaar_copy'=>'required',
        // 'recommendation_letter'=>'required',
        // 'signature'=>'required',
        // 'profile'=>'required',
        'education_id'=>'nullable',
        'document_id'=>'required',
        'document_file'=>'required',
        ];
    }
}