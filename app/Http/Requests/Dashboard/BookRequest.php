<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'image'         => 'nullable|max:2048',
            'description'   => 'required|string',
            'slug'          => 'required|string|max:255|unique:books,slug,' . $this->route('books'),
            'quantity'      => 'required|integer|min:1',
            'rate'          => 'required|numeric|min:0|max:5',
            'publish_year'  => 'required|integer|min:1900|max:' . date('Y'),
            'price'         => 'required|numeric|min:0',
            'is_available'  => 'required|boolean',
            'category_id'   => 'nullable|exists:categories,id',
            'publisher_id'  => 'nullable|exists:publishers,id',
            'author_id'     => 'nullable|exists:authors,id',
        ];
    }
    public function messages()
    {
        return [
            // الاسم
            'name.required'        => __('validation.required', ['attribute' => __('attributes.book_name')]),
            'name.string'          => __('validation.string', ['attribute' => __('attributes.book_name')]),
            'name.max'             => __('validation.max.string', ['attribute' => __('attributes.book_name'), 'max' => 255]),

            // الصورة
            'image.image'          => __('validation.image', ['attribute' => __('attributes.image')]),
            'image.mimes'          => __('validation.mimes', ['attribute' => __('attributes.image'), 'values' => 'jpeg, png, jpg, gif, svg']),
            'image.max'            => __('validation.max.file', ['attribute' => __('attributes.image'), 'max' => 2048]),

            // الوصف
            'description.required' => __('validation.required', ['attribute' => __('attributes.description')]),
            'description.string'   => __('validation.string', ['attribute' => __('attributes.description')]),

            // slug
            'slug.required'        => __('validation.required', ['attribute' => __('attributes.slug')]),
            'slug.string'          => __('validation.string', ['attribute' => __('attributes.slug')]),
            'slug.max'             => __('validation.max.string', ['attribute' => __('attributes.slug'), 'max' => 255]),
            'slug.unique'          => __('validation.unique', ['attribute' => __('attributes.slug')]),

            // الكمية
            'quantity.required'    => __('validation.required', ['attribute' => __('attributes.quantity')]),
            'quantity.integer'     => __('validation.integer', ['attribute' => __('attributes.quantity')]),
            'quantity.min'         => __('validation.min.numeric', ['attribute' => __('attributes.quantity'), 'min' => 1]),

            // التقييم
            'rate.required'        => __('validation.required', ['attribute' => __('attributes.rate')]),
            'rate.numeric'         => __('validation.numeric', ['attribute' => __('attributes.rate')]),
            'rate.min'             => __('validation.min.numeric', ['attribute' => __('attributes.rate'), 'min' => 0]),
            'rate.max'             => __('validation.max.numeric', ['attribute' => __('attributes.rate'), 'max' => 5]),

            // سنة النشر
            'publish_year.required' => __('validation.required', ['attribute' => __('attributes.publish_year')]),
            'publish_year.integer'  => __('validation.integer', ['attribute' => __('attributes.publish_year')]),
            'publish_year.min'      => __('validation.min.numeric', ['attribute' => __('attributes.publish_year'), 'min' => 1900]),
            'publish_year.max'      => __('validation.max.numeric', ['attribute' => __('attributes.publish_year'), 'max' => date('Y')]),

            // السعر
            'price.required'       => __('validation.required', ['attribute' => __('attributes.price')]),
            'price.numeric'        => __('validation.numeric', ['attribute' => __('attributes.price')]),
            'price.min'            => __('validation.min.numeric', ['attribute' => __('attributes.price'), 'min' => 0]),

            // الحالة
            'is_available.required' => __('validation.required', ['attribute' => __('attributes.is_available')]),
            'is_available.boolean'  => __('validation.boolean', ['attribute' => __('attributes.is_available')]),

            // التصنيفات والناشر والمؤلف
            'category_id.exists'   => __('validation.exists', ['attribute' => __('attributes.category')]),
            'publisher_id.exists'  => __('validation.exists', ['attribute' => __('attributes.publisher')]),
            'author_id.exists'     => __('validation.exists', ['attribute' => __('attributes.author')]),
        ];
    }
}
