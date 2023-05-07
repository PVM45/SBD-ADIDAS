<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Frontend\FrontendUserProfileController;

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

//login
Route::get('/login', [FrontendUserProfileController::class, 'login'])->name('login');
Route::post('/login_proses', [FrontendUserProfileController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [FrontendUserProfileController::class, 'logout'])->name('logout');


//regis
Route::get('/register', [FrontendUserProfileController::class, 'register'])->name('register');
Route::post('/register_proses', [FrontendUserProfileController::class, 'register_proses'])->name('register_proses');


// Frontend Pages routes
Route::get('/', [FrontendPageController::class, 'home'])->name('home');
// karegori
// Route::get('/category', [FrontendPageController::class,'category'])->name('category');


Route::get('/produk', [FrontendPageController::class, 'index'])->name('produk');


//middleware
Route::group(['middleware' => ['auth', 'CekRole:admin'], 'as' => 'cek'], function () {
    Route::get('/admin', 'FrontendPageController@admin')->name('admin');
});


// Route::get('/checkout', function () {
//     return view('frontend.frontend_layout.checkout_page.checkout');
// })->name(checkout);


Route::get('/checkout', function () {
    return view('frontend.frontend_layout.checkout_page.checkout');
});


