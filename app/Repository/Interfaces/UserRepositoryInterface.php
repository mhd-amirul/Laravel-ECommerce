<?php

namespace App\Repository\Interfaces;

interface UserRepositoryInterface {
    public function User();
    public function getUserByEmailOrId($user);
}