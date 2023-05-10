<?php

namespace App\Services;

use App\Models\Resource;
use App\Services\Interfaces\GeneralServiceInterface;

class GeneralService implements GeneralServiceInterface {

    public function basicItem()
    {
        $basic = [
            "shop_email"   => "Fashi.@gmail.com",
            "shop_number"  => "+62 810 2010 2020",
            "shop_address" => "Denpasar, Bali",
            "partner"      => Resource::where("group", "partner")->get()
        ];

        return $basic;
    }
}