<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\DTO\Product\{ProductCollection, ProductDTO, ProductFilterDTO};
use App\Factories\Product\ProductFactory;
use App\Filters\Product\ProductFilter;
use App\Repositories\Product\ProductRepository;

final class ProductService
{
    public function __construct(
        protected readonly ProductFilter $filter,
        protected readonly ProductRepository $repository,
        protected readonly ProductFactory $factory,
    ) {
    }

    public function get(ProductFilterDTO $filterDTO): ProductCollection
    {
        $query = $this->filter->buildQuery($filterDTO);
        $products = $this->repository->get($query, $filterDTO->getPageData());

        return $this->factory->buildCollection($products);
    }

    public function getById(int $id): ProductDTO
    {
        $product = $this->repository->getById($id);

        return $this->factory->buildDto($product);
    }
}
