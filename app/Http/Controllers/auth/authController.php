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
        $this->basic          = $this->generalService->basic_item();
    }

    public function go_to_login()
    {
        return view("root.pages.login")->with([
            "basic"      => $this->basic,
            "title"      => "login",
            "breadcrumb" => [["route" => "signin", "name" => "Sign In"]]]);
    }

    public function go_to_register()
    {
        return view("root.pages.register")->with([
            "basic"      => $this->basic,
            "title"      => "register",
            "breadcrumb" => [["route" => "signup", "name" => "Sign Up"]]]);
    }

    public function create_user(signupRequest $request)
    {
        $password = Hash::make($request->password);

        $create = [
            "email"    => $request->email,
            "name"     => $request->name,
            "password" => $password,
        ];

        User::create($create);

        return redirect()->route("signin")->with("session_success", "Register success!");
    }

    public function log_in_user(signinRequest $request)
    {
        $log        = [ "email" => $request->email, "password" => $request->pass ];
        $remember   = $request->has("remember") && $request->remember == "on" ? true : false;
        
        if (Auth::attempt($log, $remember)) {
            $request->session()
                    ->regenerate();

            return redirect()->route("signin");
        }

        return redirect()->back()->with("session_errors", "Login failed!");
    }

    public function log_out_user(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("signin")->with("session_success", "log out success!");
    }
}
