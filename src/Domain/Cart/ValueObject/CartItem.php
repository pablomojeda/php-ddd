<?php

namespace App\Domain\Cart\ValueObject;

class CartItem
{
    private $productId;
    private $quantity;

    public function __construct($productId, $quantity)
    {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException("Quantity must be greater than zero");
        }
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getProductId() { return $this->productId; }
    public function getQuantity() { return $this->quantity; }
}
