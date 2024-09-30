<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Review\{CreateReviewRequest, ReviewFilterRequest};
use App\Services\Review\ReviewService;
use Illuminate\Http\JsonResponse;

final class ReviewController extends Controller
{
    public function __construct(
        protected readonly ReviewService $service,
    ) {
    }

    public function index(ReviewFilterRequest $request): JsonResponse
    {
        $filterDTO = $request->toDto();
        $reviewCollection = $this->service->get($filterDTO);

        return ResponseHelper::build($reviewCollection->toArray());
    }

    public function create(CreateReviewRequest $request): JsonResponse
    {
        $dto = $request->toDto();
        $this->service->create($dto);

        return ResponseHelper::build(message: "Отзыв успешно создан!");
    }
}
