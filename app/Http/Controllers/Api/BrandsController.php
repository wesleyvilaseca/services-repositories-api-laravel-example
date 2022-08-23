<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\StoreUpdateBrand;
use App\Http\Resources\BrandResource;
use Illuminate\Http\Request;
use App\Services\BrandService;

class BrandsController extends Controller
{
    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $per_page = $request->get('per_page', 15);
        return BrandResource::collection($this->brandService->getAll($per_page));
    }

    public function show($id)
    {
        $brand = $this->brandService->getById($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand Not Found'], 404);
        }

        return new BrandResource($brand);
    }

    public function store(StoreUpdateBrand $request)
    {
        $brand = $this->brandService->store($request->all());
        return (new BrandResource($brand))->response()->setStatusCode(201);
    }

    public function update(StoreUpdateBrand $request, $id)
    {
        $this->brandService->edit($id, $request->validated());

        return response()->json([
            'updated' => true
        ])->setStatusCode(202);
    }

    public function delete($id)
    {
        if (!$brand = $this->brandService->getById($id)) {
            return response()->json(['message' => 'Brand Not Found'], 404);
        }

        $this->brandService->delete($brand->id);

        return response()->json([], 204);
    }
}
