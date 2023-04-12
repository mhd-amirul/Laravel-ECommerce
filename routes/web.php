<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view("root.pages.index");
});

Route::get('masuk', function () {
    return view("root.pages.login");
});

Route::get('daftar', function () {
    return view("root.pages.register");
});

Route::get('produk', function () {
    return view("root.pages.product");
});

Route::get('cart', function () {
    return view("root.pages.shopping-cart");
});