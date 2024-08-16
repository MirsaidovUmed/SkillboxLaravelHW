<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

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
        return view("products.index", compact("products"));
    }

    public function show()
    {
        return view("products.create");
    }
    public function store(ProductStoreRequest $request)
    {
        $this->productService->create($request->validated());
        return redirect()->route("getProductsAll")->with("success","Product created");
    }

    public function edit(int $id)
    {
        $product = $this->productService->edit($id);
        return view("products.edit", compact("product"));
    }

    public function update(ProductUpdateRequest $request, Product $product, int $id)
    {
        $this->productService->update($product, $request->validated(), $id);
        return redirect()->route("getProductsAll")->with("success","Product updated");
    }

    public function destroy(Product $product, int $id)
    {
        $this->productService->destroy($product, $id);
        return redirect()->route("getProductsAll")->with("success","Product deleted");
    }
}
