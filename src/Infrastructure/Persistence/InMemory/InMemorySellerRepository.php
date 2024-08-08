<?php

namespace App\Infrastructure\Persistence\InMemory;

use App\Domain\User\Entity\Seller;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;
use App\Domain\User\Repository\SellerRepository;
use Faker\Factory;

class InMemorySellerRepository implements SellerRepository
{
    private $sellers = [];

    public function __construct()
    {
        $faker = Factory::create();

        // Crear algunos vendedores
        for ($i = 1; $i <= 10; $i++) {
            $seller = new Seller(
                $i,
                $faker->name(),
                new Email($faker->email()),
                new Password($faker->password())
            );
            $this->save($seller);
        }
    }

    public function save(Seller $seller)
    {
        $this->sellers[$seller->getId()] = $seller;
    }

    public function findById($id): ?Seller
    {
        return $this->sellers[$id] ?? null;
    }

    public function findByEmail($email): ?Seller
    {
        foreach ($this->sellers as $seller) {
            if ($seller->getEmail()->getEmail() === $email) {
                return $seller;
            }
        }
        return null;
    }
}
