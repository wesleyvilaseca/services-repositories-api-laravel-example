<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $per_page = $request->get('per_page', 15);
        return ProductResource::collection($this->productService->getAll($per_page));
    }

    public function show($id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            return response()->json(['message' => 'product Not Found'], 404);
        }

        return new ProductResource($product);
    }

    public function store(StoreUpdateProduct $request)
    {
        $product = $this->productService->store($request->all());
        return (new ProductResource($product))->response()->setStatusCode(201);
    }

    public function update(StoreUpdateProduct $request, $id)
    {
        $this->productService->edit($id, $request->validated());

        return response()->json([
            'updated' => true
        ])->setStatusCode(202);
    }

    public function delete($id)
    {
        if (!$product = $this->productService->getById($id)) {
            return response()->json(['message' => 'product Not Found'], 404);
        }

        $this->productService->delete($product->id);

        return response()->json([], 204);
    }
}
