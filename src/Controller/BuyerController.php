<?php

namespace App\Controller;

use App\Domain\User\Service\BuyerService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BuyerController
{
    private $buyerService;

    public function __construct(BuyerService $buyerService)
    {
        $this->buyerService = $buyerService;
    }

    /**
     * @Route("/api/buyers/register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->buyerService->registerBuyer($data['id'], $data['name'], $data['email'], $data['password']);

        return new JsonResponse(['status' => 'Buyer created!'], 201);
    }
}
