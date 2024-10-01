<?php

declare(strict_types=1);

namespace App\DTO\Review;

final class ReviewDTO
{
    public function __construct(
        public int $id,
        public string $author,
        public int $rating,
        public int $product_id,
        public string $text,
        public string $date_created
    ) {
    }

    public function toArrayForIndex(): array
    {
        return [
            'id' => $this->id,
            'author' => $this->author,
            'rating' => $this->rating,
            'text' => $this->text,
            'date_created' => $this->date_created
        ];
    }
}
