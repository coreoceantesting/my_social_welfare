<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchemeRequest extends FormRequest
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
            'scheme_name' => 'required|unique:scheme_mst,scheme_name',
            'cat_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cat_id.required' => 'Please select category',

        ];
    }
}
