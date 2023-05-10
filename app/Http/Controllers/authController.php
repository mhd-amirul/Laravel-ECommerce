<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\resetPasswordRequest;
use App\Http\Requests\signinRequest;
use App\Http\Requests\signupRequest;
use App\Mail\resetPaswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use App\Services\Interfaces\GeneralServiceInterface;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
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

    public function goToResetPassword()
    {
        if (request()->has("code")) {
            $code = PasswordReset::where("forget_password_code", request("code"))->first();

            if ($code) {
                $user = User::where("id", $code->user_id)->exists();

                if ($user) {
                    if (!Carbon::now()->diff(new Carbon($code->expired_code))->invert) {
                        return view('root.pages.reset-password')->with([
                            "code"      => $code->forget_password_code,
                            "user_id"   => $code->user_id
                        ]);
                    }
    
                    $code->delete();
                    return redirect()->route("signin")->with("session_errors", "url expired!");
                }
            }
        }
        return redirect()->route("signin")->with("session_errors", "failed!");
    }

    public function createUser(signupRequest $request)
    {
        $create = [
            "email"    => $request->email,
            "name"     => $request->name,
            "password" => Hash::make($request->pass),
        ];

        User::create($create);

        return redirect()->route("signin")->with("session_success", "Sign Up success!");
    }

    public function logInUser(signinRequest $request)
    {
        // dd(Hash::make($request->pass));
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

    public function forgetPassword(forgetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $toDB = [
                "forget_password_code"    => Hash::make($request->email.Carbon::now()->format("Y-m-d H:i:s")),
                "expired_code"            => Carbon::now()->addHours(24)->format("Y-m-d H:i:s"),
            ];

            $passReset  = new PasswordReset();
            $codeReset  = $passReset->where("user_id", $user->id)->first();
            $response   = null;

            if ($codeReset) {
                $response = $codeReset->update($toDB);
            } else {
                $toDB["user_id"]    = $user->id;
                $response           = $passReset->create($toDB);
            }

            if ($response) {
                Mail::to($user->email)
                    ->send(new resetPaswordMail([
                        "email" => $user->email,
                        "name"  => $user->name,
                        "uri"   => route('forget.pass.part2')."?code=".$toDB["forget_password_code"]
                ]));

                return redirect()->back()->with("session_success", "email was sent!");
            }
        }

        return redirect()->back()->with("session_errors", "failed!");
    }

    public function resetPassword(resetPasswordRequest $request)
    {
        $code = PasswordReset::where("forget_password_code", $request->code)->first();

        if ($code) {
            $user = User::where("id", $code->user_id)->first();

            if ($user) {
                $user->update(["password" => Hash::make($request->pass)]);
                $code->delete();
                return redirect()->route("signin")->with("session_success", "password has changed!");
            }
        }

        return redirect()->route("signin")->with("session_errors", "failed!");
    }
}
