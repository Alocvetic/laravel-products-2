<?php

declare(strict_types=1);

namespace App\Services\Review;

use App\DTO\Review\{CreateReviewDTO, ReviewCollection, ReviewFilterDTO};
use App\Repositories\Review\ReviewRepository;

final class ReviewService
{
    public function __construct(
        protected readonly ReviewRepository $repository,
    ) {
    }

    public function get(ReviewFilterDTO $filterDTO): ReviewCollection
    {
        // TODO: получение с фильтрацией (по продукту) и пагинацией отзывов (data + date_created)
    }

    public function create(CreateReviewDTO $DTO): void
    {
        $this->repository->create($DTO);
    }
}
