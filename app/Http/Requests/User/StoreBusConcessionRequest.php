<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusConcessionRequest extends FormRequest
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
            // 'id_proof'=>'required',
            'adhaar_no'=>'required',
            // 'adhaar_copy'=>'required',
            'class_name'=>'required',
            'school_name'=>'required',
            // 'admission_certificate'=>'required',
            'type_of_discount'=>'required',
            // 'disability_certificate'=>'nullable'
            'bus_concession_id'=>'nullable',
            'document_id'=>'required',
            'document_file'=>'required',
        ];
    }
}