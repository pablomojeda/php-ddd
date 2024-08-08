<?php

namespace App\Domain\Product\Repository;

use App\Domain\Product\Entity\Product;

interface ProductRepository
{
    public function save(Product $product);
    public function findById($id): ?Product;
    public function findBySellerId($sellerId): array;
    public function findAll(): array;
}
