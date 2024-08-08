<?php

namespace App\Domain\Product\ValueObject;

class ProductName
{
    private $name;

    public function __construct($name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException("Product name cannot be empty");
        }
        $this->name = $name;
    }

    public function value() { return $this->name; }
}
