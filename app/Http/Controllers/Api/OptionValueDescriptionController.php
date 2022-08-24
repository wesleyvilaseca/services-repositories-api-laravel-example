<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOptionValue;
use App\Http\Resources\OptionValueDescriptionResource;
use App\Services\OptionValueDescriptionService;
use Illuminate\Http\Request;

class OptionValueDescriptionController extends Controller
{
    private $optionService;

    public function __construct(OptionValueDescriptionService $optionService)
    {
        $this->optionService = $optionService;
    }

    public function index(Request $request)
    {
        $per_page = $request->get('per_page', 15);
        return OptionValueDescriptionResource::collection($this->optionService->getAll($per_page));
    }

    public function show($id)
    {
        $brand = $this->optionService->getById($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand Not Found'], 404);
        }

        return new OptionValueDescriptionResource($brand);
    }

    public function store(StoreUpdateOptionValue $request)
    {
        $brand = $this->optionService->store($request->all());
        return (new OptionValueDescriptionResource($brand))->response()->setStatusCode(201);
    }

    public function update(StoreUpdateOptionValue $request, $id)
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
