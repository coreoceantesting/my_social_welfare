<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreCancerRequest extends FormRequest
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
       'financial_help'=>'required',
       'full_name'=>'required',
       'full_address'=>'required',
       'dob'=>'required',
       'age'=>'required',
       'contact'=>'required',
       'adhaar_no'=>'required',
       'duration_of_residence'=>'required',
       'gender'=>'required',
       'type_of_disease'=>'required',
       'diagnosis_date'=>'required',
       'hospital_name'=>'required',
       'account_no'=>'required',
       'candidate_signature'=> 'required',
       'passport_size_photo'=> 'required',
       'cancer_id'=>'nullable',
       'document_id'=>'nullable',
       'document_file'=>'nullable',
        ];
    }
}
