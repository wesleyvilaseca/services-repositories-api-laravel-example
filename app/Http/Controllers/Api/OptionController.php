<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOption;
use App\Http\Resources\OptionResource;
use App\Services\OptionService;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    private $optionService;

    public function __construct(OptionService $optionService)
    {
        $this->optionService = $optionService;
    }

    public function index(Request $request)
    {
        $per_page = $request->get('per_page', 15);
        return OptionResource::collection($this->optionService->getAll($per_page));
    }

    public function show($id)
    {
        $brand = $this->optionService->getById($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand Not Found'], 404);
        }

        return new OptionResource($brand);
    }

    public function store(StoreUpdateOption $request)
    {
        $brand = $this->optionService->store($request->all());
        return (new OptionResource($brand))->response()->setStatusCode(201);
    }

    public function update(StoreUpdateOption $request, $id)
    {
        $this->optionService->edit($id, $request->validated());

        return response()->json([
            'updated' => true
        ])->setStatusCode(202);
    }

    public function delete($id)
    {
        if (!$brand = $this->optionService->getById($id)) {
            return response()->json(['message' => 'Option Not Found'], 404);
        }

        $this->optionService->delete($brand->id);

        return response()->json([], 204);
    }
}
