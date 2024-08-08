<?php

namespace App\Domain\User\Entity;

use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;

class Seller extends User
{
    private $productsAvailable;

    public function __construct($id, $name, Email $email, Password $password, $productsAvailable = 0)
    {
        parent::__construct($id, $name, $email, $password);
        $this->productsAvailable = $productsAvailable;
    }

    public function getProductsAvailable() { return $this->productsAvailable; }
    public function incrementProductsAvailable() { $this->productsAvailable++; }
    public function decrementProductsAvailable() { $this->productsAvailable--; }
}
