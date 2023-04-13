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

Route::get('signin', [authController::class, "go_to_login"])->name("signin");
Route::get('signup', [authController::class, "go_to_register"])->name("signup");

Route::get('/', [homeController::class, "go_to_index"]);
Route::get('product', [homeController::class, "go_to_product"])->name("product");
Route::get('shopping-card', [homeController::class, "go_to_shop_card"])->name("shopping-card");

Route::get('cart', function () {
    return view("root.pages.shopping-cart");
});