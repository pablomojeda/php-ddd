<?php

namespace App\Domain\Cart\Service;

use App\Domain\Cart\Entity\Cart;
use App\Domain\Cart\Repository\CartRepository;
use App\Domain\Cart\ValueObject\CartItem;

class CartService
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function createCart($id, $buyerId)
    {
        $cart = new Cart($id, $buyerId);
        $this->cartRepository->save($cart);
    }

    public function addItemToCart($cartId, $productId, $quantity)
    {
        $cart = $this->cartRepository->findById($cartId);
        if (!$cart) {
            throw new \Exception("Cart not found");
        }

        $cartItem = new CartItem($productId, $quantity);
        $cart->addItem($cartItem);
        $this->cartRepository->save($cart);
    }

    public function removeItemFromCart($cartId, $productId)
    {
        $cart = $this->cartRepository->findById($cartId);
        if (!$cart) {
            throw new \Exception("Cart not found");
        }

        $cart->removeItem($productId);
        $this->cartRepository->save($cart);
    }

    public function getCartByBuyerId($buyerId): ?Cart
    {
        return $this->cartRepository->findByBuyerId($buyerId);
    }
}
