<?php

use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user2', [HomeController::class, 'index']);
Route::get('/product/{slug}', [HomeController::class, 'show'])->name('product.show');
Route::view('/card', 'pages.user.card');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'admin2'], function() {
        Route::resource('barang', BarangController::class);
        Route::resource('gallery', GalleryController::class);
    });
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('dashboard');
