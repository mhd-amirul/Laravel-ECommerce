<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/laravel-welcome", function () { return view("welcome"); });

Route::group(["controller" => authController::class], function () {
    Route::post("forget-password", "forgetPasswordUser")->name("forget.pass");
    Route::get("reset-password",   "goToResetPassword" )->name("forget.pass.part2");
    Route::post("reset-password",  "resetPasswordUser" )->name("reset.pass");

    Route::middleware(["guest"])->group(function () {
        Route::get("signin",       "goToLogin"    )->name("signin");
        Route::get("signup",       "goToRegister" )->name("signup");
        Route::post("signup-user", "signUpUser"   )->name("signup.create");
        Route::post("signin-user", "signInUser"   )->name("signin.check");
    });

    Route::middleware(["auth"])->group(function () {
        Route::post("signout-user", "logOutUser")->name("signout");
    });
});

Route::middleware(["auth"])->group(function () {
    Route::group(["controller" => cartController::class], function () {
        Route::get("shopping-cart",  "goToShopCart"      )->name("shopping.cart");
        Route::post("shopping-cart", "shoppingCartAction")->name("shopping.cart.action")->middleware("auth");
    });

    Route::group(["controller" => profileController::class], function () {
        Route::get("account-profile",   "goToProfile"      )->name("profile");
        Route::post("account-profile2", "updateProfileUser")->name("update.profile");
    });
});

Route::group(["controller" => homeController::class], function () {
    Route::get("/",       "goToIndex"      )->name("index");
    Route::get("product", "goToProduct"    )->name("product");
    Route::post("contact-us", "saveMessage")->name("contact");
});


// test midtrans
Route::get('/midtrans-view', [CheckOutController::class, 'testmidtrans'])->name("midtrans0");
Route::post('/midtrans-get', [CheckOutController::class, 'getData'])->name("midtrans1");
Route::get('/midtrans-set', [CheckOutController::class, 'setData'])->name("midtrans2");
