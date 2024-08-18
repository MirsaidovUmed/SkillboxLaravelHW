<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductService
{
    public function index(): object
    {
        return Product::all();
    }

    public function create(array $data): object
    {
        return Product::create($data);
    }


    public function edit(int $id): object
    {
        return Product::findOrFail($id);
    }
    public function update(Product $product, array $data, int $id): object
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function destroy(Product $product, int $id): bool
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return true;
    }
}
