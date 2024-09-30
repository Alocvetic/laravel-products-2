<?php

declare(strict_types=1);

namespace App\DTO\Review;

final class ReviewFilterDTO
{
    public function __construct(
        public int $page_limit,
        public int $page_number,
        public string $filter_product_id,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    public function getPageData(): array
    {
        return [
            'number' => $this->page_number,
            'limit' => $this->page_limit,
        ];
    }
}
