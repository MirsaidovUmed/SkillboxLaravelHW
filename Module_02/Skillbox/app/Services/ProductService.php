<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductService
{
    public function index()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'sku' => 'required|string',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        $validator = Validator::make($data, [
            'sku' => 'required|string',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $product->update($data);
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return true;
    }
}
