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
        return Product::create($data);
    }


    public function edit(int $id)
    {
        return Product::findOrFail($id);
    }
    public function update(Product $product, array $data, int $id)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function destroy(Product $product, int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return true;
    }
}
