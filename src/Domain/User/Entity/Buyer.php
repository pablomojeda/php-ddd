<?php

namespace App\Domain\User\Entity;

use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;

class Buyer extends User
{
    private $cart;

    public function __construct($id, $name, Email $email, Password $password)
    {
        parent::__construct($id, $name, $email, $password);
        $this->cart = [];
    }

    public function getCart() { return $this->cart; }
    public function addItemToCart($item) { $this->cart[] = $item; }
}
