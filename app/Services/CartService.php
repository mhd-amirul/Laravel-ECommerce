<?php

namespace App\Services;

use App\Models\Cart;
use App\Repository\Interfaces\CartRepositoryInterface;
use App\Services\Interfaces\CartServiceInterface;

class CartService implements CartServiceInterface {

    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function getUserShoppingCart($userId)
    {
        return $this->cartRepository->getCartByUserId($userId);
    }

    public function shoppingCartAction($userId, $productId, $quantity)
    {
        $cart = $this->cartRepository->getSpecificCartItem($userId, $productId);

        if ($cart) {
            if ($quantity == 0) {
                $cart->delete();
                return true;
            }

            if ($quantity == $cart->quantity)
                return true;

            $cart = $cart->update([ "quantity" => $quantity ]);

            if ($cart) 
                return true; 
        }

        if ($quantity != 0) {
            $cart = [
                "user_id"     => $userId,
                "product_id"  => $productId,
                "quantity"    => $quantity,
            ];

            $cart = $this->cartRepository->Cart()->create($cart);

            if ($cart)
                return true;
        }

        return true;

    }
}