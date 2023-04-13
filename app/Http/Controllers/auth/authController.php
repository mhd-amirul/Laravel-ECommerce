<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
    public $basic = [
        "shop_email"   => "uniform_shop@gmail.com",
        "shop_number"  => "+65 11.188.888",
        "shop_address" => "60-49 Road 11378 New York",
    ];

    public function go_to_login()
    {
        return view("root.pages.login")->with("basic", $this->basic);
    }

    public function go_to_register()
    {
        return view("root.pages.register")->with("basic", $this->basic);
    }
}
