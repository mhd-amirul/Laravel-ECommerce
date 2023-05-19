<?php

namespace App\Services\Interfaces;

interface ProductServiceInterface {
    public function getProductDiscount();
    public function getInformationItem($productId);
}