<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FlashSaleRequest extends FormRequest
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
            'name.en' => ['nullable', 'string', 'min:5', 'max:255'],
            'name.ar' => ['nullable', 'string', 'min:5', 'max:255'],
            'description.en' => ['nullable', 'string', 'min:5', 'max:255'],
            'description.ar' => ['nullable', 'string', 'min:5', 'max:255'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'integer', 'min:1', 'max:720'], // 30 days
            'is_active' => ['required', 'boolean'],
        ];
    }

    public function messages (): array
    {
        return [
    'name.en.min' => 'الاسم بالإنجليزية يجب أن يكون على الأقل 5 أحرف.',
    'name.ar.min' => 'الاسم بالعربية يجب أن يكون على الأقل 5 أحرف.',
    'description.en.min' => 'الوصف بالإنجليزية يجب أن يكون على الأقل 5 أحرف.',
    'description.ar.min' => 'الوصف بالعربية يجب أن يكون على الأقل 5 أحرف.',
    'date.after_or_equal' => 'التاريخ يجب أن يكون اليوم أو بعده.',
    'time.min' => 'المدة الزمنية يجب أن تكون دقيقة واحدة على الأقل.',
    'time.max' => 'المدة الزمنية يجب ألا تتجاوز 720 دقيقة.',
    'is_active.boolean' => 'القيمة المدخلة للحالة غير صحيحة.',

        ];
    }
}
