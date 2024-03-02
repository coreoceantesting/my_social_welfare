<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'adhaar_no'=>'required',
            'duration_of_residence'=>'required',
            'details'=>'required',
            'four_wheeler'=>'nullable',
            'receipt_no'=>'required',
            'candidate_signature'=> 'required',
            'passport_size_photo'=> 'required',
            'vehicle_id'=>'nullable',
            'document_id'=>'nullable',
            'document_file'=>'nullable',
        ];
    }
}
