<?php

namespace App\Domain\Product\ValueObject;

class Price
{
    private $amount;

    public function __construct($amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Price must be greater than zero");
        }
        $this->amount = $amount;
    }

    public function value() { return $this->amount; }
}
