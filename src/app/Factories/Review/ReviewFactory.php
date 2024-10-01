<?php

declare(strict_types=1);

namespace App\Factories\Review;

use App\DTO\PaginationDataDTO;
use App\DTO\Review\ReviewCollection;
use App\DTO\Review\ReviewDTO;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ReviewFactory
{
    public function buildCollection(LengthAwarePaginator $reviews): ReviewCollection
    {
        $reviewCollection = new ReviewCollection();

        foreach ($reviews->items() as $review) {
            $reviewDTO = $this->buildDto($review);
            $reviewCollection->setReview($reviewDTO);
        }

        $paginationDataDTO = $this->buildPaginationDataDto($reviews);
        $reviewCollection->setPaginationDTO($paginationDataDTO);

        return $reviewCollection;
    }

    public function buildDto(Review $review): ReviewDTO
    {
        $date_created = Carbon::parse($review->created_at)->format('d.m.Y H:i');

        return new ReviewDTO(
            $review->id,
            $review->author,
            $review->rating,
            $review->product_id,
            $review->text,
            $date_created
        );
    }

    protected function buildPaginationDataDto(LengthAwarePaginator $reviews): PaginationDataDTO
    {
        return new PaginationDataDTO(
            $reviews->total(),
            $reviews->perPage(),
            $reviews->currentPage(),
            $reviews->lastPage(),
        );
    }
}
