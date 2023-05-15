<?php

namespace App\Services;

use App\Repository\Interfaces\ContactRepositoryInterface;
use App\Repository\Interfaces\ResourcesRepositoryInterface;
use App\Services\Interfaces\GeneralServiceInterface;

class GeneralService implements GeneralServiceInterface {

    protected $resourceRepository;
    protected $contactRepository;

    public function __construct(ResourcesRepositoryInterface $resourceRepository, ContactRepositoryInterface $contactRepository)
    {
        $this->resourceRepository = $resourceRepository;
        $this->contactRepository  = $contactRepository ;
    }

    public function basicItem()
    {        
        $basic    = [
            "shop_email"   => "Fashi.@gmail.com",
            "shop_number"  => "+62 810 2010 2020",
            "shop_address" => "Denpasar, Bali",
            "partner"      => $this->resourceRepository->getResourceByGroup(["partner"])["partner"]
        ];

        return $basic;
    }

    public function sendMessage(array $item)
    {
        return $this->contactRepository->Contact()->create($item);
    }
}