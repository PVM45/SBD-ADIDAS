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

//tes single produk
Route::get('/single_produk', function () {
    return view('frontend.frontend_layout.product_page.single_product');
});

// tes produk
Route::get('/produk', function () {
    return view('frontend.frontend_layout.product_page.products');
});

//tes policy
Route::get('/policy', function () {
    return view('policy');
});

//tes term
Route::get('/term', function () {
    return view('term');
});


//tes changepassword
Route::get('/user/password/change', function () {
    return view('frontend.profile.changepassword');
});


//tes profile
Route::get('/profile', function () {
    return view('frontend.profile.index');
});


//login
Route::get('/login', [FrontendUserProfileController::class, 'login'])->name('login');
Route::post('/login_proses', [FrontendUserProfileController::class, 'login_proses'])->name('login_proses');


//regis
Route::get('/register', [FrontendUserProfileController::class, 'register'])->name('register');
Route::post('/register_proses', [FrontendUserProfileController::class, 'register_proses'])->name('register_proses');




// category
// Route::get('/category', [FrontendPageController::class,'category'])->name('category');


//product (belum)
Route::get('/product', [FrontendPageController::class, 'index'])->name('Product');


//tes checkout
Route::get('/checkout', function () {
    return view('frontend.checkout_page.checkout');
});

//tes contact
Route::get('/contact', function () {
    return view('frontend.frontend_layout.contact_page.contact');
});


// Frontend customer/user logout, profile, change password routes
Route::middleware(['auth:web'])->group(function(){

    Route::middleware(['auth:sanctum, web', 'verified'])->get('/dashboard',[FrontendUserProfileController::class, 'userdashboard'])->name('dashboard');

    Route::prefix('/user')->group(function () {
        Route::get('/logout', [FrontendUserProfileController::class, 'userlogout'])->name('user.logout');
        Route::get('/profile', [FrontendUserProfileController::class, 'userprofile'])->name('user.profile');
        Route::post('/profile', [FrontendUserProfileController::class, 'userprofileupdate'])->name('user.profile');
        // Route::get('/password/change', [FrontendUserProfileController::class, 'userpasswordchange'])->name('user.change.password');
        Route::post('/password/update', [FrontendUserProfileController::class, 'userpasswordupdate'])->name('user.update.password');

        // user order history
        Route::get('/orders/history', [OrderHistoryController::class, 'orderHistory'])->name('user.orders');
    });
});


//Frontend Pages routes
Route::get('/', [FrontendPageController::class, 'home'])->name('home');



//middleware
Route::group(['middleware' => ['auth', 'CekRole:admin'], 'as' => 'cek'], function () {
    Route::get('/admin', 'FrontendPageController@admin')->name('admin');
});



