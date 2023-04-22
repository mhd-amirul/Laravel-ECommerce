<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;

class homeController extends Controller
{
    protected $basic = [];
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService)
    {
        $this->generalService = $generalService;
        $this->basic          = $this->generalService->basic_item();
    }

    public function go_to_index()
    {
        $product  = Product::latest()->whereNot("discount", 50)->get();
        $discount = Product::latest()->where("discount", 50)->get();

        return view("root.pages.index")
            ->with([
                "basic"   => $this->basic,
                "title"   => "home",
                "products" => $product,
                "discount" => $discount
            ]);
    }

    public function go_to_product()
    {
        return view("root.pages.product")->with([
            "basic"      => $this->basic,
            "title"      => "detail product",
            "breadcrumb" => [["route" => "product", "name" => "Detail Product"]]]);
    }

    public function go_to_shop_card()
    {
        return view("root.pages.shopping-cart")->with([
            "basic"      => $this->basic,
            "title"      => "shopping cart",
            "breadcrumb" => [["route" => "shopping-card", "name" => "Shopping Cart"]]]);
    }
}
