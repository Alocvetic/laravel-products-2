<?php

declare(strict_types=1);

namespace App\Repositories\Review;

use App\DTO\Review\CreateReviewDTO;
use App\Models\Review;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

final class ReviewRepository
{
    public function get(Builder $query, array $pageData): LengthAwarePaginator
    {
        return $query->paginate($pageData['limit'], page: $pageData['number']);
    }

    public function create(CreateReviewDTO $DTO): int
    {
        $review = new Review($DTO->toArray());
        $review->save();

        return $review->id;
    }
}
