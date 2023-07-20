<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\shoppingCartRequest;
use App\Models\Cart;
use App\Services\Interfaces\CartServiceInterface;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;

class cartController extends Controller
{
    protected $basic = [];
    protected $cartService;
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService, CartServiceInterface $cartService)
    {
        $this->generalService   = $generalService;
        $this->basic            = $this->generalService->basicItem();
        $this->cartService      = $cartService;
    }

    public function goToShopCart()
    {
        return view("root.pages.shopping-cart")->with([
            "basic"         => $this->basic,
            "title"         => "shopping cart",
            "shoppingCart"  => $this->cartService->getUserShoppingCart(auth()->user()->id),
            "breadcrumb"    => [["route" => "shopping-card", "name" => "Shopping Cart"]]]);
    }

    public function shoppingCartAction(shoppingCartRequest $request)
    {
        $this->cartService->shoppingCartAction(auth()->user()->id, $request->product_id, $request->quantity);

        return redirect()->route("shopping.cart");
    }

}
