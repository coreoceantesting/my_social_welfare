<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'scheme_id' => 'required',
            'document_name' => 'required',
            'document_initial' => 'required',
            'is_required' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'scheme_id.required' => 'Please select scheme',
        ];
    }
}