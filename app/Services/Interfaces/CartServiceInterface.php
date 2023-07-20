<?php

namespace App\Services\Interfaces;

interface CartServiceInterface {
    public function getUserShoppingCart($userId);
    public function shoppingCartAction($userId, $productId, $quantity);
}