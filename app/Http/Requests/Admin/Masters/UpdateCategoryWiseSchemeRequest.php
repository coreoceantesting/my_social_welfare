<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryWiseSchemeRequest extends FormRequest
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
            'category_id' => 'nullable',
            'scheme_id' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please select category',
            'scheme_id' => 'Please select Scheme Name',
        ];
    }
}
