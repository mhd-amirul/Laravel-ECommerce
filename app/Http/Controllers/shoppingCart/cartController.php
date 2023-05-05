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
            "basic"      => $this->basic,
            "title"      => "shopping cart",
            "breadcrumb" => [["route" => "shopping-card", "name" => "Shopping Cart"]]]);
    }

    public function insertCart(shoppingCartRequest $request)
    {

        $user_id = auth()->user()->id;

        $shoppingCart = $this->shoppingCart
            ->where("user_id",    $user_id)
            ->where("product_id", $request->product_id)
            ->first();

        if ( !empty($shoppingCart) ) {
            dd($request->quantity + $shoppingCart->quantity);
            $shoppingCart = $shoppingCart->update([ "quantity" => $request->quantity + $shoppingCart->quantity ]);

            if ( $shoppingCart ) 
                return redirect()->back(); 
        }

        $shoppingCart = [
            "user_id"     => $user_id,
            "product_id"  => $request->product_id,
            "quantity"    => $request->quantity,
        ];

        $shoppingCart = $this->shoppingCart->create($shoppingCart);

        if ( $shoppingCart )
            return redirect()->back();
    }

}