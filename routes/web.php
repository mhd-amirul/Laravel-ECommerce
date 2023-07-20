<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { return view('welcome'); });

Route::get("/laravel-welcome", function () { return view("welcome"); });

Route::middleware(["guest"])->group(function () {
    Route::get("signin", [authController::class, "goToLogin"])->name("signin");
    Route::get("signup", [authController::class, "goToRegister"])->name("signup");
    Route::post("signup-user", [authController::class, "signUpUser"])->name("signup.create");
    Route::post("signin-user", [authController::class, "signInUser"])->name("signin.check");
});

Route::middleware(["auth"])->group(function () {
    Route::post("signout-user", [authController::class, "logOutUser"])->name("signout");

    Route::get("shopping-cart", [cartController::class, "goToShopCart"])->name("shopping.cart");
    Route::post("shopping-cart", [cartController::class, "shoppingCartAction"])->name("shopping.cart.action")->middleware("auth");

    Route::get("account-profile", [profileController::class, "goToProfile"])->name("profile");
    Route::post("account-profile2", [profileController::class, "updateProfileUser"])->name("update.profile");
});

Route::post("forget-password", [authController::class, "forgetPasswordUser"])->name("forget.pass");
Route::get("reset-password", [authController::class, "goToResetPassword"])->name("forget.pass.part2");
Route::post("reset-password", [authController::class, "resetPasswordUser"])->name("reset.pass");

Route::get("/", [homeController::class, "goToIndex"])->name("index");
Route::get("product", [homeController::class, "goToProduct" ])->name("product");
Route::post("contact-us", [homeController::class, "saveMessage"])->name("contact");