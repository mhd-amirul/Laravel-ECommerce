<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\resetPasswordRequest;
use App\Http\Requests\signinRequest;
use App\Http\Requests\signupRequest;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    protected $basic = [];
    protected $generalService;
    protected $authService;

    public function __construct(GeneralServiceInterface $generalService, AuthServiceInterface $authService)
    {
        $this->generalService   = $generalService;
        $this->authService      = $authService;
        $this->basic            = $this->generalService->basicItem();
    }

    public function goToLogin()
    {
        return view("root.pages.login")->with([
            "basic"      => $this->basic,
            "title"      => "login",
            "breadcrumb" => [["route" => "signin", "name" => "Sign In"]]]);
    }

    public function goToRegister()
    {
        return view("root.pages.register")->with([
            "basic"      => $this->basic,
            "title"      => "register",
            "breadcrumb" => [["route" => "signup", "name" => "Sign Up"]]]);
    }

    public function goToResetPassword()
    {
        if (request()->has("code")) {
            $code = $this->authService->checkResetPasswordCode(request("code"));

            if ($code) {
                return view('root.pages.reset-password')->with([
                    "code"      => $code->forget_password_code,
                    "user_id"   => $code->user_id
                ]);
            }

            return redirect()->route("signin")->with("session_errors", "url expired!");
        }
        return redirect()->route("signin")->with("session_errors", "failed!");
    }

    public function signUpUser(signupRequest $request)
    {
        $user = $this->authService->signUp($request->email, $request->name, $request->pass);

        $message["status" ] = $user ? "session_success"  : "session_errors";
        $message["message"] = $user ? "Sign Up success!" : "failed!";

        return redirect()->route("signin")->with($message["status"], $message["message"]);
    }

    public function signInUser(signinRequest $request)
    {
        $user = $this->authService->signIn($request);

        if ($user)
            return redirect()->route("index")->with("session_success", "Sign In success!");

        return redirect()->back()->with("session_errors", "failed!");
    }

    public function logOutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("signin")->with("session_success", "Sign Out success!");
    }

    public function forgetPasswordUser(forgetPasswordRequest $request)
    {
        $user = $this->authService->forgetPassword($request->email);

        $message["status" ] = $user ? "session_success"  : "session_errors";
        $message["message"] = $user ? "email was sent!"  : "failed!";

        return redirect()->back()->with($message["status"], $message["message"]);
    }

    public function resetPasswordUser(resetPasswordRequest $request)
    {
        $code = $this->authService->resetPassword($request->code, $request->pass);
        
        $message["status" ] = $code ? "session_success"        : "session_errors";
        $message["message"] = $code ? "password has changed!"  : "failed!";

        return redirect()->route("signin")->with($message["status"], $message["message"]);
    }
}
