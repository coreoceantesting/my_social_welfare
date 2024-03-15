<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreSportsRequest extends FormRequest
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
            'financial_help'=>'required',
            'email'=>'required',
            'school_name'=>'required',
            'candidate_signature'=> 'required',
            'passport_size_photo'=> 'required',
            'sports_id'=>'nullable',
            'document_id'=>'nullable',
            'document_file'=>'nullable',
            'recommendation_letter' => 'required',
            'state_or_national_certificate' => 'required',
            'school_certificate' => 'required',
        ];
    }
}
