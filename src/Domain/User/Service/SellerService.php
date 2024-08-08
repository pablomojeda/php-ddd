<?php

namespace App\Domain\User\Service;

use App\Domain\User\Entity\Seller;
use App\Domain\User\Repository\SellerRepository;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\Repository\ProductRepository;
use App\Domain\User\ValueObject\Email;
use App\Domain\User\ValueObject\Password;
use App\Domain\Product\ValueObject\ProductName;
use App\Domain\Product\ValueObject\Price;

class SellerService
{
    private $sellerRepository;
    private $productRepository;

    public function __construct(SellerRepository $sellerRepository, ProductRepository $productRepository)
    {
        $this->sellerRepository = $sellerRepository;
        $this->productRepository = $productRepository;
    }

    public function registerSeller($id, $name, $email, $password)
    {
        $emailVO = new Email($email);
        $passwordVO = new Password($password);
        $seller = new Seller($id, $name, $emailVO, $passwordVO);
        $this->sellerRepository->save($seller);
    }

    public function addProduct($id, $name, $description, $price, $sellerId)
    {
        $nameVO = new ProductName($name);
        $priceVO = new Price($price);
        $product = new Product($id, $nameVO, $description, $priceVO, $sellerId);

        $this->productRepository->save($product);

        $seller = $this->sellerRepository->findById($sellerId);
        if ($seller) {
            $seller->incrementProductsAvailable();
            $this->sellerRepository->save($seller);
        }
    }
}
