<?php

namespace App\Controller;

use App\Domain\Cart\Service\CartService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @Route("/api/carts/create", methods={"POST"})
     */
    public function createCart(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->cartService->createCart($data['id'], $data['buyerId']);

        return new JsonResponse(['status' => 'Cart created!'], 201);
    }

    /**
     * @Route("/api/carts/add-item", methods={"POST"})
     */
    public function addItem(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->cartService->addItemToCart($data['cartId'], $data['productId'], $data['quantity']);

        return new JsonResponse(['status' => 'Item added to cart!'], 201);
    }

    /**
     * @Route("/api/carts/remove-item", methods={"POST"})
     */
    public function removeItem(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->cartService->removeItemFromCart($data['cartId'], $data['productId']);

        return new JsonResponse(['status' => 'Item removed from cart!'], 200);
    }

    /**
     * @Route("/api/carts/buyer/{buyerId}", methods={"GET"})
     */
    public function getCartByBuyerId($buyerId): JsonResponse
    {
        $cart = $this->cartService->getCartByBuyerId($buyerId);

        if (!$cart) {
            return new JsonResponse(['status' => 'Cart not found'], 404);
        }

        return new JsonResponse($cart);
    }
}
