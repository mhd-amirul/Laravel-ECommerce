<?php

namespace App\Repository\Interfaces;

interface ProductRepositoryInterface {
    public function Product();
    public function getByDiscount($code = 50);
}