<?php

namespace App\Services\Interfaces;

interface AuthServiceInterface {
    public function signUp($email, $name, $password);
    public function signIn($user);
    public function forgetPassword($email);
    public function resetPassword($code, $password);
    public function checkResetPasswordCode($code);
}