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
            'name.en' => 'required|string|min:3|max:255',
            'name.ar' => 'required|string|min:3|max:255',
            'description.en' => 'required|string|min:3|max:600',
            'description.ar' => 'required|string|min:3|max:600',
            'date' => 'required|after_or_equal:today',
            'start_time' => 'required|time',
            'time' => 'required|date_format:H:i',
            'is_active' => 'required|boolean',
            'percentage' => 'required|numeric|min:1|max:90',

        ];
    }

    public function messages(): array
    {
          if (app()->getLocale() == 'ar') {
        return [
            'name.en.required' => 'الاسم باللغة الإنجليزية مطلوب.',
            'name.en.string' => 'الاسم باللغة الإنجليزية يجب أن يكون نصًا.',
            'name.en.min' => 'الاسم باللغة الإنجليزية يجب أن يحتوي على 3 أحرف على الأقل.',
            'name.en.max' => 'الاسم باللغة الإنجليزية يجب ألا يزيد عن 255 حرفًا.',

            'name.ar.required' => 'الاسم باللغة العربية مطلوب.',
            'name.ar.string' => 'الاسم باللغة العربية يجب أن يكون نصًا.',
            'name.ar.min' => 'الاسم باللغة العربية يجب أن يحتوي على 3 أحرف على الأقل.',
            'name.ar.max' => 'الاسم باللغة العربية يجب ألا يزيد عن 255 حرفًا.',

            'description.en.required' => 'الوصف باللغة الإنجليزية مطلوب.',
            'description.en.string' => 'الوصف باللغة الإنجليزية يجب أن يكون نصًا.',
            'description.en.min' => 'الوصف باللغة الإنجليزية يجب أن يحتوي على 3 أحرف على الأقل.',
            'description.en.max' => 'الوصف باللغة الإنجليزية يجب ألا يزيد عن 600 حرفًا.',

            'description.ar.required' => 'الوصف باللغة العربية مطلوب.',
            'description.ar.string' => 'الوصف باللغة العربية يجب أن يكون نصًا.',
            'description.ar.min' => 'الوصف باللغة العربية يجب أن يحتوي على 3 أحرف على الأقل.',
            'description.ar.max' => 'الوصف باللغة العربية يجب ألا يزيد عن 600 حرفًا.',

            'date.required' => 'التاريخ مطلوب.',
            'date.after_or_equal' => 'التاريخ يجب أن يكون اليوم أو بعده.',

            'start_time.required' => 'وقت البداية مطلوب.',
            'start_time.date_format' => 'وقت البداية يجب أن يكون بتنسيق HH:mm.',

            'time.required' => 'الوقت مطلوب.',
            'time.date_format' => 'الوقت يجب أن يكون بتنسيق HH:mm.',

            'is_active.required' => 'حالة النشاط مطلوبة.',
            'is_active.boolean' => 'حالة النشاط يجب أن تكون إما "مفعّل" أو "غير مفعّل".',

            'percentage.required' => 'النسبة مطلوبة.',
            'percentage.numeric' => 'النسبة يجب أن تكون رقمًا.',
            'percentage.min' => 'النسبة يجب أن تكون على الأقل 1%.',
            'percentage.max' => 'النسبة يجب ألا تتجاوز 90%.',
        ];
        }else{

            return [
            'name.en.required' => 'The English name is required.',
            'name.en.string' => 'The English name must be a valid string.',
            'name.en.min' => 'The English name must be at least 3 characters.',
            'name.en.max' => 'The English name must not exceed 255 characters.',

            'name.ar.required' => 'The Arabic name is required.',
            'name.ar.string' => 'The Arabic name must be a valid string.',
            'name.ar.min' => 'The Arabic name must be at least 3 characters.',
            'name.ar.max' => 'The Arabic name must not exceed 255 characters.',

            'description.en.required' => 'The English description is required.',
            'description.en.string' => 'The English description must be a valid string.',
            'description.en.min' => 'The English description must be at least 3 characters.',
            'description.en.max' => 'The English description must not exceed 600 characters.',

            'description.ar.required' => 'The Arabic description is required.',
            'description.ar.string' => 'The Arabic description must be a valid string.',
            'description.ar.min' => 'The Arabic description must be at least 3 characters.',
            'description.ar.max' => 'The Arabic description must not exceed 600 characters.',

            'date.required' => 'The date is required.',
            'date.after_or_equal' => 'The date must be today or later.',

            'start_time.required' => 'The start time is required.',
            'start_time.date_format' => 'The start time must be in the format HH:mm.',

            'time.required' => 'The time is required.',
            'time.date_format' => 'The time must be in the format HH:mm.',

            'is_active.required' => 'The active status is required.',
            'is_active.boolean' => 'The active status must be true or false.',

            'percentage.required' => 'The percentage is required.',
            'percentage.numeric' => 'The percentage must be a number.',
            'percentage.min' => 'The percentage must be at least 1%.',
            'percentage.max' => 'The percentage must not exceed 90%.',
        
        ];
        }
    }
}
