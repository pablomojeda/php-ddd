<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Entity\Buyer;

interface BuyerRepository
{
    public function save(Buyer $buyer);
    public function findById($id): ?Buyer;
    public function findByEmail($email): ?Buyer;
}
