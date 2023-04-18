<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\signinRequest;
use App\Http\Requests\signupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public $basic = [
        "shop_email"   => "uniform_shop@gmail.com",
        "shop_number"  => "+65 11.188.888",
        "shop_address" => "60-49 Road 11378 New York",
    ];

    public function go_to_login()
    {
        return view("root.pages.login")->with([
            "basic"      => $this->basic,
            "breadcrumb" => [["route" => "signin", "name" => "Sign In"]]]);
    }

    public function go_to_register()
    {
        return view("root.pages.register")->with([
            "basic"      => $this->basic,
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

        return redirect()->route("signin")->with("session_success", "Sign up success!");
    }

    public function log_in_user(signinRequest $request)
    {
        $log        = [ "email" => $request->email, "password" => $request->pass ];
        $remember   = $request->has("remember") && $request->remember == "on" ? true : false;
        
        if (Auth::attempt($log, $remember)) {
            $request->session()
                    ->regenerate();

            return redirect()
                    ->intended("/")
                    ->with("session_success", "sign in was success!");
        }

        return redirect()->back()->with("session_errors", "sign in was failed!");
    }

    public function log_out_user(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("signin")->with("session_success", "log out success!");
    }
}
