<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $products = $this->productService->index();
        return view("products.index", compact("products"));
    }

    public function show(): View
    {
        return view("products.create");
    }
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $this->productService->create($request->validated());
        return redirect()->route("getProductsAll")->with("success","Product created");
    }

    public function edit(int $id): View
    {
        $product = $this->productService->edit($id);
        return view("products.edit", compact("product"));
    }

    public function update(ProductUpdateRequest $request, Product $product, int $id): RedirectResponse
    {
        $this->productService->update($product, $request->validated(), $id);
        return redirect()->route("getProductsAll")->with("success","Product updated");
    }

    public function destroy(Product $product, int $id): RedirectResponse
    {
        $this->productService->destroy($product, $id);
        return redirect()->route("getProductsAll")->with("success","Product deleted");
    }
}
