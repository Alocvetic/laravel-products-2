<?php

declare(strict_types=1);

namespace App\Services\Review;

use App\DTO\Review\{CreateReviewDTO, ReviewCollection, ReviewFilterDTO};
use App\Factories\Review\ReviewFactory;
use App\Filters\Review\ReviewFilter;
use App\Repositories\Review\ReviewRepository;

final class ReviewService
{
    public function __construct(
        protected readonly ReviewFilter $filter,
        protected readonly ReviewRepository $repository,
        protected readonly ReviewFactory $factory,
    ) {
    }

    public function get(ReviewFilterDTO $filterDTO): ReviewCollection
    {
        $query = $this->filter->buildQuery($filterDTO);
        $reviews = $this->repository->get($query, $filterDTO->getPageData());

        return $this->factory->buildCollection($reviews);
    }

    public function create(CreateReviewDTO $DTO): int
    {
        return $this->repository->create($DTO);
    }
}
