<?php

namespace App\Domain\Cart\ValueObject;

class CartId
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId() { return $this->id; }
}
