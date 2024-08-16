<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'sku' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название продукта обязательно для заполнения.',
            'sku.required' => 'Артикул продукта обязателен для заполнения.',
        ];
    }
}
