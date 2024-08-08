<?php

namespace App\Domain\Cart\Repository;

use App\Domain\Cart\Entity\Cart;

interface CartRepository
{
    public function save(Cart $cart);
    public function findById($id): ?Cart;
    public function findByBuyerId($buyerId): ?Cart;
}
