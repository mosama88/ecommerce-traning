<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
        ];
    }


    public function messages(): array
    {
        if (app()->getLocale() == 'ar') {
            return [
                'name.required' => 'حقل الاسم مطلوب.',
                'name.string' => 'حقل الاسم يجب أن يكون نصاً.',
                'name.min' => 'حقل الاسم يجب أن يحتوي على 3 أحرف على الأقل.',
                'name.max' => 'حقل الاسم يجب ألا يزيد عن 255 حرفاً.',
            ];
        } else {
            return [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name field must be a string.',
                'name.min' => 'The name field must be at least 3 characters.',
                'name.max' => 'The name field must not exceed 255 characters.',
            ];
        }
    }
}
