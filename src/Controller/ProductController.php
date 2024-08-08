<?php

namespace App\Controller;

use App\Domain\Product\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/api/products", methods={"GET"})
     */
    public function getAllProducts(): JsonResponse
    {
        $products = $this->productRepository->findAll();

        $productsArray = array_map(function($product) {
            return [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'sellerId' => $product->getSellerId()
            ];
        }, $products);

        return new JsonResponse($productsArray);
    }
}
