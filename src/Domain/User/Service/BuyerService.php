<?php

namespace App\Domain\User\Service;

use App\Domain\User\Entity\Buyer;
use App\Domain\User\Repository\BuyerRepository;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;

class BuyerService
{
    private $buyerRepository;

    public function __construct(BuyerRepository $buyerRepository)
    {
        $this->buyerRepository = $buyerRepository;
    }

    public function registerBuyer($id, $name, $email, $password)
    {
        $emailVO = new Email($email);
        $passwordVO = new Password($password);
        $buyer = new Buyer($id, $name, $emailVO, $passwordVO);
        $this->buyerRepository->save($buyer);
    }
}
