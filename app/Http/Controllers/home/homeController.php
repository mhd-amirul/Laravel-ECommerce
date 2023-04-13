<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public $basic = [
        "shop_email"   => "uniform_shop@gmail.com",
        "shop_number"  => "+65 11.188.888",
        "shop_address" => "60-49 Road 11378 New York",
    ];

    public function go_to_index()
    {
        return view("root.pages.index")->with("basic", $this->basic);
    }

    public function go_to_product()
    {
        return view("root.pages.product")->with("basic", $this->basic);
    }

    public function go_to_shop_card()
    {
        return view("root.pages.shopping-cart")->with("basic", $this->basic);
    }
}
