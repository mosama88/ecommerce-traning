<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name.en' => 'required|string|min:3|max:255',
            'name.ar' => 'required|string|min:3|max:255',
            'discount_id' => 'nullable|exists:discounts,id',
        ];
    }


    public function messages(): array
    {
        return [
            'name.en.required' => 'The English Category name is required.',
            'name.en.string'   => 'The English Category name must be a string.',
            'name.en.min'      => 'The English Category name must be at least 3 characters.',
            'name.en.max'      => 'The English Category name must not exceed 255 characters.',
            'discount_id.exists' => 'The selected discount is invalid.',

            'name.ar.required' => 'أسم الفئة (عربى) مطلوب.',
            'name.ar.string'   => 'أسم الفئة (عربى) يجب أن يكون نص.',
            'name.ar.min'      => 'أسم الفئة (عربى) يجب أن يكون على الأقل 3 أحرف.',
            'name.ar.max'      => 'أسم الفئة (عربى) يجب ألا يتجاوز 255 حرفاً.',
        ];
    }
}