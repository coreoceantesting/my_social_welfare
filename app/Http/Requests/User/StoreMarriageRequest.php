<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarriageRequest extends FormRequest
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
            'ward_no'=>'required',
            'ward_id'=>'required',
            'full_name'=>'required',
            'full_address'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'father_name'=>'required',
            'father_address'=>'required',
            'contact'=> ['required', 'string', 'regex:/^\d{10}$/'],
            'bank_name'=>'required',
            'branch_name'=>'required',
            'account_no'=>'required',
            'ifsc_code'=>'required',
            'adhaar_no'=> ['required', 'string', 'regex:/^\d{12}$/'],
            'profession'=>'required',
            'agriculture'=>'required',
            'caste'=>'required',
            'candidate_signature'=> 'required',
            'passport_size_photo'=> 'required',
            'marriage_id'=>'nullable',
            'document_id'=>'nullable',
            'document_file'=>'nullable',
            'candidate_signature'=>'required',
            'passport_size_photo'=>'required',
            'document_file.*'=>'required',
        ];
    }
}
