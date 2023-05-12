<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateProfileRequest;
use App\Models\User;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Http\Request;

class profileController extends Controller
{
    protected $basic = [];
    protected $generalService;

    public function __construct(GeneralServiceInterface $generalService)
    {
        $this->generalService = $generalService;
        $this->basic          = $this->generalService->basicItem();
    }

    public function goToProfile()
    {
        return view("root.pages.profile")->with([
            "basic"      => $this->basic,
            "title"      => "My Account",
            "user"       => auth()->user(),
            "breadcrumb" => [["route" => "profile", "name" => "My Account"]]]);
    }

    public function updateProfile(updateProfileRequest $request)
    {
        $user = User::where('email', $request->email)->orWhere("id", $request->id)->first();

        if ($user) {
            $user->update(["name" => $request->name]);

            return redirect()->back()->with("session_success", "profile updated!");
        }

        return redirect()->back()->with("session_errors", "failed!");
    }
}
