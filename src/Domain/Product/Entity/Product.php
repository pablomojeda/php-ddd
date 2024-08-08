<?php

namespace App\Domain\Product\Entity;

use App\Domain\Product\ValueObject\ProductName;
use App\Domain\Product\ValueObject\Price;

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $sellerId;

    public function __construct($id, ProductName $name, $description, Price $price, $sellerId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->sellerId = $sellerId;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name->value(); }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price->value(); }
    public function getSellerId() { return $this->sellerId; }
}
