<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'sku' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название продукта обязательно для заполнения.',
            'sku.required' => 'Артикул продукта обязателен для заполнения.',
        ];
    }
}
