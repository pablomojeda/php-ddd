<?php

namespace App\Infrastructure\Persistence\InMemory;

use App\Domain\User\Entity\Buyer;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;
use App\Domain\User\Repository\BuyerRepository;
use Faker\Factory;


class InMemoryBuyerRepository implements BuyerRepository
{
    private $buyers = [];

    public function __construct()
    {
        $faker = Factory::create();

        // Crear algunos compradores
        for ($i = 1; $i <= 10; $i++) {
            $buyer = new Buyer(
                $i,
                $faker->name(),
                new Email($faker->email()),
                new Password($faker->password())
            );
            $this->save($buyer);
        }
    }

    public function save(Buyer $buyer)
    {
        $this->buyers[$buyer->getId()] = $buyer;
    }

    public function findById($id): ?Buyer
    {
        return $this->buyers[$id] ?? null;
    }

    public function findByEmail($email): ?Buyer
    {
        foreach ($this->buyers as $buyer) {
            if ($buyer->getEmail()->getEmail() === $email) {
                return $buyer;
            }
        }
        return null;
    }
}
