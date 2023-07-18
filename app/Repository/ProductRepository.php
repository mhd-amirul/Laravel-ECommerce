<?php

namespace App\Repository;

use App\Models\Product;
use App\Repository\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function Product()
    {
        return $this->product;
    }

    public function getByDiscount($code = 50)
    {
        return [
            "product"  => $this->product->latest()->where("discount", '<'  ,$code)->get(),
            "discount" => $this->product->latest()->where("discount", '>=' ,$code)->get()
        ];
    }
}