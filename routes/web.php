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
    return view('index');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/single', function () {
    return view('single');
});
