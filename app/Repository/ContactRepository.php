<?php

namespace App\Repository;

use App\Model\Contact;
use App\Repository\Interfaces\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface {

    private $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function Contact()
    {
        return $this->contact;
    }
}