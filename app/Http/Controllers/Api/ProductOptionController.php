<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductOptionResource;
use App\Services\ProductOptionService;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    private $productOptionService;

    public function __construct(ProductOptionService $productOptionService)
    {
        $this->productOptionService = $productOptionService;
    }

    public function index(Request $request, $product_id)
    {
        return $this->productOptionService->getAll($product_id);
    }

    public function atachOptionProducts(Request $request, $product_id)
    {
        return $this->productOptionService->atachOption($product_id, $request->options);
    }

    public function detachOptionProducts(Request $request, $product_id)
    {
        return $this->productOptionService->detachOption($product_id, $request->options);
    }
}
