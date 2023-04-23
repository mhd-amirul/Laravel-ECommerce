<?php

use App\Http\Controllers\auth\authController;
use App\Http\Controllers\home\homeController;
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
        Route::get('signin', "go_to_login")->name("signin");
        Route::get('signup', "go_to_register")->name("signup");
        Route::post('signup_user', "create_user")->name("signup.create");
        Route::post('signin_user', "log_in_user")->name("signin.check");
    });
    Route::post('signout_user', "log_out_user")->name("signout")->middleware("auth");
});

Route::get('/', [homeController::class, "go_to_index"])->name("index");
Route::get('product', [homeController::class, "go_to_product"])->name("product");
Route::get('shopping-card', [homeController::class, "go_to_shop_card"])->name("shopping-card");
