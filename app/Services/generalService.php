<?php

namespace App\Services;

use App\Repository\Interfaces\ContactRepositoryInterface;
use App\Services\Interfaces\GeneralServiceInterface;

class GeneralService implements GeneralServiceInterface {

    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository  = $contactRepository ;
    }

    public function basicItem()
    {
        $partner = [
            [
                "name"  => "banToni",
                "type"  => "image",
                "group" => "partner",
                "uri"   => "Assets/images/partner/logo-1.png"
            ],
            [
                "name"  => "vCorp",
                "type"  => "image",
                "group" => "partner",
                "uri"   => "Assets/images/partner/logo-2.png"
            ],
            [
                "name"  => "alitume",
                "type"  => "image",
                "group" => "partner",
                "uri"   => "Assets/images/partner/logo-3.png"
            ],
            [
                "name"  => "zukata",
                "type"  => "image",
                "group" => "partner",
                "uri"   => "Assets/images/partner/logo-4.png"
            ],
            [
                "name"  => "vicink",
                "type"  => "image",
                "group" => "partner",
                "uri"   => "Assets/images/partner/logo-5.png"
            ],
        ];

        $basic    = [
            "shop_email"   => "Hello@SingleEcommerce.com",
            "shop_number"  => "+62 810 2010 2020",
            "shop_address" => "Denpasar, Bali",
            "partner"      => $partner
        ];

        return $basic;
    }

    public function sendMessage(array $item)
    {
        return $this->contactRepository->Contact()->create($item);
    }
}