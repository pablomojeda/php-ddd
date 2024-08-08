<?php

namespace App\Infrastructure\Persistence\InMemory;

use App\Domain\Cart\Entity\Cart;
use App\Domain\Cart\Repository\CartRepository;
use Faker\Factory;


class InMemoryCartRepository implements CartRepository
{
    private $carts = [];

    public function __construct()
    {
        $faker = Factory::create();

        // Crear algunos carritos
        for ($i = 1; $i <= 10; $i++) {
            $cart = new Cart(
                $i,
                $faker->numberBetween(1, 10), 
                []
            );
            $this->save($cart);
        }
    }

    public function save(Cart $cart)
    {
        $this->carts[$cart->getId()] = $cart;
    }

    public function findById($id): ?Cart
    {
        return $this->carts[$id] ?? null;
    }

    public function findByBuyerId($buyerId): ?Cart
    {
        foreach ($this->carts as $cart) {
            if ($cart->getBuyerId() === $buyerId) {
                return $cart;
            }
        }
        return null;
    }
}
