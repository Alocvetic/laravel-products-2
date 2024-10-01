<?php

declare(strict_types=1);

namespace App\DTO\Review;

use App\DTO\PaginationDataDTO;

final class ReviewCollection
{
    private array $reviews = [];

    private PaginationDataDTO $paginationDataDTO;

    public function setPaginationDTO(PaginationDataDTO $paginationDataDTO): void
    {
        $this->paginationDataDTO = $paginationDataDTO;
    }

    public function setReview(ReviewDTO $reviewDTO): void
    {
        $this->reviews[] = $reviewDTO;
    }

    public function toArray(): array
    {
        $reviewItems = [];
        foreach ($this->reviews as $review) {
            $reviewItems[] = $review->toArrayForIndex();
        }

        return [
            'items' => $reviewItems,
            'paginationData' => $this->paginationDataDTO->toArray(),
        ];
    }
}
