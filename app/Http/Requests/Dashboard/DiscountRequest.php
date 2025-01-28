<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Discount;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'code' => ['required', 'string', 'size:12', Rule::unique(Discount::class)->ignore(request()->discount_id)],
            'quantity' => 'required|numeric|min:1|max:100',
            'percentage' => 'required|numeric|min:1|max:90',
            'expiry_date' => 'required|after:now',
        ];
    }


    public function messages(): array
    {
        if (app()->getLocale() == 'ar') {
            return [
                // Code validation
                'code.required' => 'كود الخصم مطلوب.',
                'code.string' => 'كود الخصم يجب أن يكون نصاً.',
                'code.size' => 'كود الخصم يجب أن يتكون من 12 حرفاً.',
                'code.unique' => 'كود الخصم مُستخدم من قبل.',

                // Quantity validation
                'quantity.required' => 'الكمية مطلوبة.',
                'quantity.numeric' => 'الكمية يجب أن تكون رقماً.',
                'quantity.min' => 'الكمية يجب أن تكون على الأقل 1.',
                'quantity.max' => 'الكمية يجب ألا تتجاوز 100.',

                // Percentage validation
                'percentage.required' => 'نسبة الخصم مطلوبة.',
                'percentage.numeric' => 'نسبة الخصم يجب أن تكون رقماً.',
                'percentage.min' => 'نسبة الخصم يجب ألا تقل عن 1.',
                'percentage.max' => 'نسبة الخصم يجب ألا تتجاوز 90.',

                // Expiry date validation
                'expiry_date.required' => 'تاريخ انتهاء الصلاحية مطلوب.',
                'expiry_date.after' => 'تاريخ انتهاء الصلاحية يجب أن يكون في المستقبل.',
            ];
        } else {
            return [
                // Code validation
                'code.required' => 'The discount code is required.',
                'code.string' => 'The discount code must be a valid string.',
                'code.size' => 'The discount code must be exactly 12 characters.',
                'code.unique' => 'The discount code has already been used.',

                // Quantity validation
                'quantity.required' => 'The quantity is required.',
                'quantity.numeric' => 'The quantity must be a number.',
                'quantity.min' => 'The quantity must be at least 1.',
                'quantity.max' => 'The quantity may not exceed 100.',

                // Percentage validation
                'percentage.required' => 'The discount percentage is required.',
                'percentage.numeric' => 'The discount percentage must be a number.',
                'percentage.min' => 'The discount percentage must be at least 1.',
                'percentage.max' => 'The discount percentage may not exceed 90.',

                // Expiry date validation
                'expiry_date.required' => 'The expiry date is required.',
                'expiry_date.after' => 'The expiry date must be a future date.',
            ];
        }
    }
}
