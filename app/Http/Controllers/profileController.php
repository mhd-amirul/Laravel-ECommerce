<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateProfileRequest;
use App\Models\User;
use App\Services\Interfaces\GeneralServiceInterface;
use App\Services\Interfaces\ProfileServiceInterface;
use Illuminate\Http\Request;

class profileController extends Controller
{
    private $basic = [];
    private $generalService;
    private $profileService;

    public function __construct(GeneralServiceInterface $generalService, ProfileServiceInterface $profileService)
    {
        $this->profileService = $profileService;
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

    public function updateProfileUser(updateProfileRequest $request)
    {
        $updateProfile = $this->profileService->updateProfile(["name" => $request->name], $request->email);

        if ($updateProfile) {
            return redirect()->back()->with("session_success", "profile updated!");
        }

        return redirect()->back()->with("session_errors", "failed!");
    }
}
