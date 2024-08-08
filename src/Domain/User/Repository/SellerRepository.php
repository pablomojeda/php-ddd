<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Entity\Seller;

interface SellerRepository
{
    public function save(Seller $seller);
    public function findById($id): ?Seller;
    public function findByEmail($email): ?Seller;
}
