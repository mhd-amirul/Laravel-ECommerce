<?php

namespace App\Repository\Interfaces;

interface CartRepositoryInterface {
    public function Cart();
    public function getCartByUserId($userId);
    public function getSpecificCartItem($userId, $productId);
}