<?php

namespace App\Controller;

use App\Domain\User\Service\SellerService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SellerController
{
    private $sellerService;

    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    /**
     * @Route("/api/sellers/register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->sellerService->registerSeller($data['id'], $data['name'], $data['email'], $data['password']);

        return new JsonResponse(['status' => 'Seller created!'], 201);
    }

    /**
     * @Route("/api/sellers/{sellerId}/products", methods={"POST"})
     */
    public function addProduct(Request $request, $sellerId): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->sellerService->addProduct($data['id'], $data['name'], $data['description'], $data['price'], $sellerId);

        return new JsonResponse(['status' => 'Product added!'], 201);
    }
}
