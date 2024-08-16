<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->index();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = $this->productService->create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $updatedProduct = $this->productService->update($product, $request->all());
        return response()->json($updatedProduct);
    }

    public function destroy(Product $product)
    {
        $this->productService->destroy($product);
        return response()->json(null, 204);
    }
}
