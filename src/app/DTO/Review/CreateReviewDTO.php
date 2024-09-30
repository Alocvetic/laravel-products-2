<?php

declare(strict_types=1);

namespace App\DTO\Review;

final class CreateReviewDTO
{
    public function __construct(
        public string $author,
        public int $rating,
        public int $product_id,
        public string $text,
    ) {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
