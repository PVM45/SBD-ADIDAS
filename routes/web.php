<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\sessionproduk;
use App\Http\Controllers\Admin\SubbCategoryController;

use App\Http\Controllers\Admin\ProdukController;

use App\Http\Controllers\Frontend\FrontendUserProfileController;
use App\Http\Controllers\productController;



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
require __DIR__ . '/auth.php';

//admin 
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    
    //category
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    
    //sub category
    Route::get('/subcategories/create', [SubbCategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/subcategories', [SubbCategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subcategories', [SubbCategoryController::class, 'index'])->name('subcategories.index');

    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/subcategories/{subcategory}', [SubbCategoryController::class, 'destroy'])->name('subcategories.destroy');
    Route::get('/subcategories/{subcategory}/edit', [SubbCategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/subcategories/{subcategory}', [SubbCategoryController::class, 'update'])->name('subcategories.update');
    Route::get('/products/create', [ProdukController::class, 'create'])->name('products.create');
    Route::post('/products', [ProdukController::class, 'store'])->name('products.store');
    Route::get('/product', [ProdukController::class, 'index'])->name('products.index');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::delete('/subcategories/{subcategory}', [SubbCategoryController::class, 'destroy'])->name('subcategories.destroy');
    Route::get('/subcategories/{subcategory}/edit', [SubbCategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/subcategories/{subcategory}', [SubbCategoryController::class, 'update'])->name('subcategories.update');

});


//user
Route::group(['as' => 'author.', 'prefix' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('/dashboard',[FrontendUserProfileController::class, 'userdashboard'])->name('dashboard');
    Route::get('/password/change', [FrontendUserProfileController::class, 'userpasswordchange'])->name('user.change.password');
    Route::get('/profile', [FrontendUserProfileController::class, 'userprofile'])->name('user.profile');
    Route::post('/profile', [FrontendUserProfileController::class, 'userprofileupdate'])->name('user.profile');
    Route::post('/password/update', [FrontendUserProfileController::class, 'userpasswordupdate'])->name('user.update.password');

    // user order history
    Route::get('/orders/history', [OrderHistoryController::class, 'orderHistory'])->name('user.orders');

});


// Frontend Pages routes
Route::get('/', [FrontendPageController::class, 'home'])->name('home');



//TES
Route::get('/checkout', function () {
    return view('frontend.frontend_layout.checkout_page.checkout');
});



//category
Route::get('/leo', [sessionproduk::class, 'kategori'])->name('tes');


//tes wishlist
Route::get('/list/wishlists', [WishlistController::class,'listWishList'])->name('listWishlist');
   

//tes co
Route::get('/checkout', function () {
    return view('frontend.frontend_layout.checkout_page.checkout');
})->name('checkout');


//tes all product
Route::get('/produk', [productController::class,'index'])->name('produk.index');


//tes single produk
Route::post('/produk/{id}', [productController::class,'show'])->name('produk.show');


Route::get('/produk/{id}', [productController::class,'show'])->name('produk.show');

//More Products
Route::get('/produk_more', [productController::class,'Showmore'])->name('produk.more');


//tes single produk
Route::get('/single_produk', function () {
    return view('frontend.frontend_layout.product_page.single_product');
})->name('single_produk');

//tes contact 
Route::get('/contact', function () {
    return view('frontend.frontend_layout.contact_page.contact');
})->name('contact');

//tes policy term
Route::get('/term_policy', function () {
    return view('term_policy');
})->name('term_policy');
