<?php

namespace App\Repository;

use App\Models\contact;
use App\Repository\Interfaces\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface {

    private $contact;

    public function __construct()
    {
        $this->contact = new contact();
    }

    public function Contact()
    {
        return $this->contact;
    }
}