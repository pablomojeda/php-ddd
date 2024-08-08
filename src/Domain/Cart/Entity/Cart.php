<?php

namespace App\Domain\Cart\Entity;

use App\Domain\Cart\ValueObject\CartItem;

class Cart
{
    private $id;
    private $buyerId;
    private $items;

    public function __construct($id, $buyerId, array $items = [])
    {
        $this->id = $id;
        $this->buyerId = $buyerId;
        $this->items = $items;
    }

    public function getId() { return $this->id; }
    public function getBuyerId() { return $this->buyerId; }
    public function getItems() { return $this->items; }

    public function addItem(CartItem $item)
    {
        $this->items[] = $item;
    }

    public function removeItem($productId)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProductId() === $productId) {
                unset($this->items[$key]);
                break;
            }
        }
        $this->items = array_values($this->items);
    }
}
