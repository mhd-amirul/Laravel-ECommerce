<?php

namespace App\Http\Controllers;

use App\Http\Requests\shoppingCartRequest;
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
        $this->cartService      = $cartService;
        $this->basic            = $this->generalService->basicItem();
    }
    
    public function cartPage()
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
