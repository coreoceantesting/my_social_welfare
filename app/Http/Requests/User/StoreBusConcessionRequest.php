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
            // 'full_name'=>'required',
            'f_name'=>'required',
            'm_name'=>'required',
            'l_name'=>'required',
            'full_address'=>'required',
            'dob'=>'required',
            'age'=>'required',
            'contact' => ['required', 'regex:/^[0-9]{10}$/'],
            'adhaar_no'=> ['required', 'regex:/^[0-9]{12}$/'],
            'class_name'=>'nullable',
            'school_name'=>'nullable',
            'type_of_discount'=>'required',
            'candidate_signature'=> 'required',
            'passport_size_photo'=> 'required',
            'bus_concession_id'=>'nullable',
            'document_id'=>'nullable',
            'document_file'=>'nullable',
            'is_bonafied_doc'=>'required',
            'is_residental_doc'=>'required',
            'is_divyang_doc'=>'required',
        ];
    }
}
