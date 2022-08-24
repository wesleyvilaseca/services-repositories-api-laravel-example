<?php

namespace App\Services;

use App\Http\Resources\OptionResource;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductOptionService
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getAll($product_id)
    {
        if (!$product = $this->productService->getById($product_id)) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        return OptionResource::collection($product->options);
    }

    public function atachOption($id, $data_options)
    {
        if (!$product = $this->productService->getById($id)) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        DB::beginTransaction();
        try {
            $product->options()->attach($data_options);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 409);
        }

        return response()->json(['message' => 'Success On Operation'], 201);
    }

    public function detachOption($id, $data_options)
    {
        if (!$product = $this->productService->getById($id)) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        $product->options()->detach($data_options);

        return response()->json([], 204);
    }
}
