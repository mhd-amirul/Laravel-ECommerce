<?php

namespace App\Repository;

use App\Models\PasswordResetAccount;
use App\Repository\Interfaces\PasswordResetRepositoryInterface;

class PasswordResetRepository implements PasswordResetRepositoryInterface {

    private $passwordReset;

    public function __construct()
    {
        $this->passwordReset = new PasswordResetAccount();
    }

    public function PasswordReset()
    {
        return $this->passwordReset;
    }

    public function getByCode($code)
    {
        return $this->passwordReset->where("forget_password_code", $code)->first();
    }
}