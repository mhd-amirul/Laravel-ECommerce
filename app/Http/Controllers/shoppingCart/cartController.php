<?php

namespace App\Http\Controllers\shoppingCart;

use App\Http\Controllers\Controller;
use App\Http\Requests\shoppingCartRequest;
use App\Models\Cart;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;

class cartController extends Controller
{
    protected $basic = [];
    protected $shoppingCart;
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService)
    {
        $this->generalService   = $generalService;
        $this->basic            = $this->generalService->basicItem();
        $this->shoppingCart     = new Cart();
    }

    public function goToShopCart()
    {
        return view("root.pages.shopping-cart")->with([
            "basic"         => $this->basic,
            "title"         => "shopping cart",
            "shoppingCart"  => $this->shoppingCart->latest()->where("user_id", auth()->user()->id)->get(),
            "breadcrumb"    => [["route" => "shopping-card", "name" => "Shopping Cart"]]]);
    }

    public function insertCart(shoppingCartRequest $request)
    {

        if ($request->quantity == 0) return redirect()->back();

        $shoppingCart = $this->shoppingCart
            ->where("user_id",    auth()->user()->id)
            ->where("product_id", $request->product_id)
            ->first();

        if ( !empty($shoppingCart) ) {
            $shoppingCart = $shoppingCart->update([ "quantity" => $request->quantity + $shoppingCart->quantity ]);

            if ( $shoppingCart ) 
                return redirect()->route("shopping.cart"); 
        }

        $shoppingCart = [
            "user_id"     => auth()->user()->id,
            "product_id"  => $request->product_id,
            "quantity"    => $request->quantity,
        ];

        $shoppingCart = $this->shoppingCart->create($shoppingCart);

        if ( $shoppingCart )
            return redirect()->route("shopping.cart");
    }

    public function updateCart(shoppingCartRequest $request)
    {
        $shoppingCart = $this->shoppingCart
            ->where("user_id",    auth()->user()->id)
            ->where("product_id", $request->product_id)
            ->first();

        if ( !empty($shoppingCart) ) {
            if ($request->quantity == 0) {
                $shoppingCart->delete();
                return redirect()->route("shopping.cart");
            }

            $shoppingCart = $shoppingCart->update([ "quantity" => $request->quantity ]);

            if ( $shoppingCart ) 
                return redirect()->route("shopping.cart"); 
        }

        return redirect()->route("shopping.cart");
    }

}