<?php

use App\Http\Controllers\auth\authController;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\shoppingCart\cartController;
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

Route::get('/laravel-welcome', function () { return view('welcome'); });
Route::group(["controller" => authController::class], function () {
    Route::group(["midlleware" => "guest"], function () {
        Route::get('signin', "goToLogin")->name("signin");
        Route::get('signup', "goToRegister")->name("signup");
        Route::post('signup-user', "createUser")->name("signup.create");
        Route::post('signin-user', "logInUser")->name("signin.check");
    });
    Route::post('signout-user', "logOutUser")->name("signout")->middleware("auth");
});

Route::get('/', [homeController::class, "goToIndex"])->name("index");
Route::get('product', [homeController::class, "goToProduct"])->name("product");
Route::get('shopping-cart', [cartController::class, "goToShopCart"])->name("shopping.cart");
Route::post('insert-shopping-cart', [cartController::class, "insertCart"])->name("insert.cart");