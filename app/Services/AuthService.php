<?php

namespace App\Services;

use App\Mail\resetPaswordMail;
use App\Repository\Interfaces\PasswordResetRepositoryInterface;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\AuthServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthService implements AuthServiceInterface {

    private $userRepository;
    private $passwordResetRepository;

    public function __construct(UserRepositoryInterface $userRepository, PasswordResetRepositoryInterface $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository  = $passwordResetRepository;
    }

    public function signUp($email, $name, $password)
    {
        return $this->userRepository->User()->create([
            "email"    => $email,
            "name"     => $name,
            "password" => Hash::make($password),
        ]);
    }

    public function signIn($user)
    {
        $log        = [
            "email"    => $user->email,
            "password" => $user->pass
        ];

        $remember   = $user->has("remember") && $user->remember == "on" ? true : false;

        if (Auth::attempt($log, $remember)) {
            $user->session()->regenerate();
            return true;
        }

        return false;
    }

    public function forgetPassword($email)
    {
        $user = $this->userRepository->getUserByEmailOrId($email);

        if ($user) {
            $toDB = [
                "forget_password_code"    => Hash::make($email.Carbon::now()->format("Y-m-d H:i:s")),
                "expired_code"            => Carbon::now()->addHours(24)->format("Y-m-d H:i:s"),
            ];

            $codeReset  = $this->passwordResetRepository->PasswordReset()->where("user_id", $user->id)->first();
            $response   = null;

            if ($codeReset) {
                $response = $codeReset->update($toDB);
            } else {
                $toDB["user_id"]    = $user->id;
                $response           = $this->passwordResetRepository->PasswordReset()->create($toDB);
            }

            if ($response) {
                Mail::to($user->email)
                    ->send(new resetPaswordMail([
                        "email" => $user->email,
                        "name"  => $user->name,
                        "uri"   => route('forget.pass.part2')."?code=".$toDB["forget_password_code"]
                ]));

                return true;
            }
        }

        return false;
    }

    public function checkResetPasswordCode($code)
    {
        $code = $this->passwordResetRepository->getByCode($code);

        if ($code) {
            $user = $this->userRepository->User()->where("id", $code->user_id)->exists();

            if ($user) {
                if (!Carbon::now()->diff(new Carbon($code->expired_code))->invert) {
                    return $code;
                }

                $code->delete();
                return false;
            }
        }

        return false;
    }

    public function resetPassword($code, $password)
    {
        $code = $this->passwordResetRepository->getByCode($code);

        if ($code) {
            $user = $this->userRepository->getUserByEmailOrId($code->user_id);

            if ($user) {
                $user->update(["password" => Hash::make($password)]);
                $code->delete();
                return true;
            }
        }

        return false;
    }
}