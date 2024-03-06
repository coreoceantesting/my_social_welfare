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
            'candidate_signature'=> 'nullable',
            'passport_size_photo'=> 'nullable',
            'is_residence_proof'=> 'required',
            'is_low_income_proof'=> 'required',
            'is_medical_admission_proof'=> 'required',
            'is_recommendation_doc'=> 'required',
            'is_first_year_proof'=> 'required',
            'is_pass_book_doc'=> 'required',
        ];
    }
}