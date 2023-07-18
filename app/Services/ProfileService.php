<?php

namespace App\Services;

use App\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\ProfileServiceInterface;

class ProfileService implements ProfileServiceInterface {

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateProfile(array $item, $userIdOrEmail)
    {
        $user = $this->userRepository->getUserByEmailOrId($userIdOrEmail);

        if ($user) {
            $user->update($item);

            return true;
        }

        return false;
    }
}