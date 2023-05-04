<?php

namespace App\Http\Controllers;

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
    return view('index');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/products', function () {

    return view('products')->name('products');
});

Route::get('/register1', function () {

    return view('register');
});

Route::get('/signup', function () {
    return view('signup');

});

Route::get('/single', function () {
    return view('single');

});

Route::get('/single', function () {
    return view('single');
});
Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/produk',[HomeController::class,'index'])->name('produk');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login_proses',[LoginController::class,'login_proses'])->name('login_proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register_proses',[LoginController::class,'register_proses'])->name('register_proses');


//middleware
Route::group(['middleware'=>['auth','CekRole:admin'], 'as' => 'cek'],function(){
    Route::get('/admin','HomeController@admin')->name('admin');

    });