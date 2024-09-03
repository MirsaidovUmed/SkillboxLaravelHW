<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected $productService;

    public function index(): LengthAwarePaginator 
    {
        return Product::paginate(10);
    }

    public function show(Product $product): Product
    {
        return $product;
    }

    public function store(ProductStoreRequest $request): JsonResponse
    {
        $product = Product::create([
            'sku' => $request->get('sku'),
            'name' => $request->get('name'),
            'price' => $request->get('price'),
        ]);

        return response()->json($product, 201);
    }

    // public function edit(int $id): View
    // {
    //     $product = $this->productService->edit($id);
    //     return view("products.edit", compact("product"));
    // }

    public function update(ProductStoreRequest $request, Product $product): JsonResponse
    {
        $product->update([
            'sku' => $request->get('sku'),
            'name' => $request->get('name'),
            'price' => $request->get('price'),
        ]);

        return response()->json($product, 202);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json([], 204);
    }
}
