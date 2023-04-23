<?php

namespace App\Services;

use App\Models\Resource;
use App\Services\Interfaces\GeneralServiceInterface;

class GeneralService implements GeneralServiceInterface {

    public function basic_item()
    {
        $basic = [
            "shop_email"   => "uniform_shop@gmail.com",
            "shop_number"  => "+65 11.188.888",
            "shop_address" => "60-49 Road 11378 New York",
            "partner"      => Resource::where("group", "partner")->get()
        ];

        return $basic;
    }
}