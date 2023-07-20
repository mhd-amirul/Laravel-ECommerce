<?php

namespace App\Repository;

use App\Model\Cart;
use App\Repository\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface {

    private $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function Cart()
    {
        return $this->cart;
    }

    public function getCartByUserId($userId)
    {
        return $this->cart->where("user_id", $userId)->get();
    }

    public function getSpecificCartItem($userId, $productId)
    {
        return $this->cart->where("user_id", $userId)->where("product_id", $productId)->first();
    }
}