<?php

namespace App\Infrastructure\Persistence\InMemory;

use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductName;
use App\Domain\Product\ValueObject\Price;
use App\Domain\Product\Repository\ProductRepository;
use Faker\Factory;

class InMemoryProductRepository implements ProductRepository
{
    private $products = [];

    public function __construct()
    {
        $faker = Factory::create();

        // Crear algunos productos
        for ($i = 1; $i <= 30; $i++) {
            $product = new Product(
                $i,
                new ProductName($faker->word()),
                $faker->text(),
                new Price($faker->randomFloat(2, 1, 100)),
                $faker->numberBetween(1, 10)
            );
            $this->save($product);
        }
    }


    public function save(Product $product)
    {
        $this->products[$product->getId()] = $product;
    }

    public function findById($id): ?Product
    {
        return $this->products[$id] ?? null;
    }

    public function findBySellerId($sellerId): array
    {
        $result = [];
        foreach ($this->products as $product) {
            if ($product->getSellerId() === $sellerId) {
                $result[] = $product;
            }
        }
        return $result;
    }
    public function findAll(): array
    {
        return array_values($this->products);
    }
}
