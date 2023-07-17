<?php

use App\Http\Controllers\authController;
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

Route::get('/', function () { return view('welcome'); });

Route::get("signin", [authController::class, "loginPage"])->name("signin");
Route::post("signin-user", function () { return view('welcome'); })->name("signin.check");
Route::get("signup",function () { return view('welcome'); })->name("signup");
Route::post("forget-password", function () { return view('welcome'); })->name("forget.pass");

Route::get("account-profile", function () { return view('welcome'); })->name("profile");

Route::get("shopping-cart", function () { return view('welcome'); })->name("shopping.cart");

Route::get("/", function () { return view('welcome'); })->name("index");
Route::post("contact-us", function () { return view('welcome'); })->name("contact");