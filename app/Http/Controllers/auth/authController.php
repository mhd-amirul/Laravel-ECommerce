<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\signinRequest;
use App\Http\Requests\signupRequest;
use App\Models\User;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    protected $basic = [];
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService)
    {
        $this->generalService = $generalService;
        $this->basic          = $this->generalService->basicItem();
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

    public function createUser(signupRequest $request)
    {
        $password = Hash::make($request->password);

        $create = [
            "email"    => $request->email,
            "name"     => $request->name,
            "password" => $password,
        ];

        User::create($create);

        return redirect()->route("signin")->with("session_success", "Sign Up success!");
    }

    public function logInUser(signinRequest $request)
    {
        $log        = [ "email" => $request->email, "password" => $request->pass ];
        $remember   = $request->has("remember") && $request->remember == "on" ? true : false;
        
        if (Auth::attempt($log, $remember)) {
            $request->session()
                    ->regenerate();

            return redirect()->route("index");
        }

        return redirect()->back()->with("session_errors", "Sign In failed!");
    }

    public function logOutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("signin")->with("session_success", "Sign Out success!");
    }
}
