<?php

declare(strict_types=1);

namespace App\DTO\Product;

final class ProductDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public string $category,
        public float $price,
        public float $average_rating,
        public ?string $image = null,
    ) {
    }

    public function toArrayForIndex(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category,
            'price' => $this->price,
            'average_rating' => $this->average_rating,
            'image' => $this->image,
        ];
    }
    public function toArray(): array
    {
        return (array)$this;
    }
}
