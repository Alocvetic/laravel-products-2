<?php

declare(strict_types=1);

namespace App\Filters\Review;

use App\DTO\Review\ReviewFilterDTO;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;

final class ReviewFilter
{
    protected ReviewFilterDTO $dto;

    public function __construct(
        protected Builder $query,
    ) {
        $this->query = Review::query();
    }

    public function buildQuery(ReviewFilterDTO $filterDTO): Builder
    {
        $this->dto = $filterDTO;

        $this->page();
        $this->filter();

        return $this->query;
    }

    protected function filter(): void
    {
        $this->filterByProductId();
    }

    protected function filterByProductId(): void
    {
        $productId = $this->dto->filter_product_id;

        $this->query->where('product_id', '=', $productId);
    }

    protected function page(): void
    {
        $this->query->forPage($this->dto->page_number, $this->dto->page_limit);
    }
}
