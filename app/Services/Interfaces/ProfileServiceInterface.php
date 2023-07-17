<?php

namespace App\Services\Interfaces;

interface ProfileServiceInterface {
    public function updateProfile(array $item, $userIdOrEmail);
}