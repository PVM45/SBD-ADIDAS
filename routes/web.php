<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\sessionproduk;

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


require __DIR__ . '/auth.php';

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
});

Route::group(['as' => 'author.', 'prefix' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', [AuthorDashboard::class, 'index'])->name('dashboard');
    
});

Route::get('/profile', function () {
    return view('frontend.frontend_layout.profile.index');
});
Route::get('/leo', [sessionproduk::class, 'kategori'])->name('tes');

// Route::middleware(['auth:web'])->group(function(){

//     Route::middleware(['auth:sanctum, web', 'verified'])->get('/dashboard',[FrontendUserProfileController::class, 'userdashboard'])->name('dashboard');

//     Route::prefix('/user')->group(function () {
//         Route::get('/logout', [FrontendUserProfileController::class, 'userlogout'])->name('user.logout');
//         Route::get('/profile', [FrontendUserProfileController::class, 'userprofile'])->name('user.profile');
//         Route::post('/profile', [FrontendUserProfileController::class, 'userprofileupdate'])->name('user.profile');
//         Route::get('/password/change', [FrontendUserProfileController::class, 'userpasswordchange'])->name('user.change.password');
//         Route::post('/password/update', [FrontendUserProfileController::class, 'userpasswordupdate'])->name('user.update.password');

//         // user order history
//         Route::get('/orders/history', [OrderHistoryController::class, 'orderHistory'])->name('user.orders');
//     });
// });

Route::get('/checkout', function () {
    return view('frontend.frontend_layout.checkout_page.checkout');
});



// Frontend Pages routes
Route::get('/home', [FrontendPageController::class, 'home'])->name('home');


