<?php

namespace App\Services;

use App\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface {

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductDiscount()
    {
        return $this->productRepository->getByDiscount();
    }

    public function getInformationItem($productId)
    {
        $product = $this->productRepository->Product()->where("id", $productId)->with("Ratings")->first();

        $related = $this->productRepository
            ->Product()
            ->byCategory($this->productRepository
            ->Product(), explode(',', str_replace(' ', '', $product->category)))
            ->get();

        if ($product->Ratings->count() != 0)
            $product->rating = $product->Ratings->sum("rating") / $product->Ratings->count();

        return [
            "product" => $product,
            "related" => $related
        ];
    }

}