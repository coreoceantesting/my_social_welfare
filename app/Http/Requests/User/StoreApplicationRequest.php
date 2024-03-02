<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'ward_id'=>'required',
            'ward_no'=>'required',
            'full_name'=>'required',
            'full_address'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'father_name'=>'required',
            'father_address'=>'required',
            'contact'=>'required',
            'alternate_contact_no'=>'required',
            'type_of_disability'=>'required',
            'percentage'=>'required',
            'bank_name'=>'required',
            'branch_name'=>'required',
            'account_no'=>'required',
            'ifsc_code'=>'required',
            'authority_name'=>'required',
            'adhaar_no'=>'required',
            'profession'=>'required',
            'number_of_family'=>'required',
            'agriculture'=>'required',
            'personal_benefit'=>'required',
            'received_year'=>'required',
            'welfare_schemes'=>'required',
            'govt_scheme'=>'required',
            'poverty_number'=>'required',
            'caste'=>'required',
            'candidate_signature'=> 'required',
            'passport_size_photo'=> 'required',
            'divyang_id'=>'nullable',
            'document_id'=>'nullable',
            'document_file'=>'nullable',
        ];
    }
}