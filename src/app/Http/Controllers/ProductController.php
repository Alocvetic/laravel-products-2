<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Product\ProductFilterRequest;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

final class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductService $service,
    ) {
    }

    public function index(ProductFilterRequest $request): JsonResponse
    {
        $filterDTO = $request->toDto();
        $productCollection = $this->service->get($filterDTO);

        return ResponseHelper::build($productCollection->toArray());
    }

    public function show(int $id): JsonResponse
    {
        $productDto = $this->service->getById($id);

        return ResponseHelper::build($productDto->toArray());
    }
}
