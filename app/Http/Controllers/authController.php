<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function loginPage()
    {
        $basic    = [
            "shop_email"   => "Fashi.@gmail.com",
            "shop_number"  => "+62 810 2010 2020",
            "shop_address" => "Denpasar, Bali",
            "partner"      => []
        ];

        return view("root.pages.login")->with([
            "basic"      => $basic,
            "title"      => "login",
            "breadcrumb" => [["route" => "signin", "name" => "Sign In"]]]);
    }
}
