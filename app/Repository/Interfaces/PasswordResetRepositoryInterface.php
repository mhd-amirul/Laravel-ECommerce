<?php

namespace App\Repository\Interfaces;

interface PasswordResetRepositoryInterface  {
    public function PasswordReset();
    public function getByCode($code);
}