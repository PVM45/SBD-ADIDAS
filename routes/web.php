<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessionproduk;
use App\Http\Controllers\productController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\OrderHistoryController;
use App\Http\Controllers\Admin\SubbCategoryController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Frontend\FrontendUserProfileController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboard;
use App\Http\Controllers\SubscribeController;



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
    Route::get('/generate-report', [DashboardController::class,'generate'])->name('generate.report');

    //useradmin
    Route::get('/useradmin', [UserAdminController::class, 'index'])->name('useradmin');
    Route::put('/useradmin/{id}', [UserAdminController::class, 'update'])->name('useradmin.update');

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
    Route::get('/stok', [ProdukController::class, 'show'])->name('stok.index');
    Route::get('/monitor', [ProdukController::class, 'monitor'])->name('product.monitor');
    Route::put('/stok/{id}/update', [ProdukController::class, 'updatestok'])->name('stok.update');
    Route::get('/pesanan/konfirmasi', [PesananController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
    Route::post('/pesanan/{id}/konfirmasi', [PesananController::class, 'prosesKonfirmasi'])->name('pesanan.prosesKonfirmasi');
    Route::post('/pesanan/{id}/batalkan', [PesananController::class, 'batalkan'])->name('pesanan.batalkanKonfirmasi');
    Route::get('metode_pembayaran', [PesananController::class, 'index'])->name('metode_pembayaran.index');
    Route::post('metode_pembayaran', [PesananController::class, 'store'])->name('metode_pembayaran.store');
    Route::put('metode_pembayaran/{id}', [PesananController::class, 'update'])->name('metode_pembayaran.update');
    Route::delete('metode_pembayaran/{id}', [PesananController::class, 'destroy'])->name('metode_pembayaran.destroy');
});




//user
Route::group(['as' => 'author.', 'prefix' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('/dashboard', [FrontendUserProfileController::class, 'userdashboard'])->name('dashboard');
    Route::get('/password/change', [FrontendUserProfileController::class, 'userpasswordchange'])->name('user.change.password');
    Route::get('/profile', [FrontendUserProfileController::class, 'userprofile'])->name('user.profile');
    Route::post('/profile', [FrontendUserProfileController::class, 'userprofileupdate'])->name('user.profile.update');
    Route::post('/password/update', [FrontendUserProfileController::class, 'userpasswordupdate'])->name('user.update.password');
    // Route::post('profile/alamat',[FrontUserProfileController::class, ''])

    // user order history
    Route::get('/orders/history', [OrderHistoryController::class, 'orderHistory'])->name('user.orders');

    //user address
    Route::get('/address', [AddressController::class, 'ShowAddress'])->name('user.address');
    Route::post('/address/process', [AddressController::class, 'AddressProcess'])->name('user.address.process');

    //checkout
    Route::get('/checkout', [CartController::class, 'ShowCheckout'])->name('checkout');
    Route::post('/checkout/proses', [CartController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout/receipt', [CartController::class, 'receipt'])->name('checkout.receipt');
});


// Frontend Pages routes
Route::get('/', [FrontendPageController::class, 'home'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('produk.search');
Route::get('/list/wishlists', [WishlistController::class, 'listWishList'])->name('listWishlist');
Route::get('/produk', [productController::class, 'index'])->name('produk');
Route::post('/produk/{id}', [productController::class, 'show'])->name('produk.show');
Route::get('/produk/{id}', [productController::class, 'show'])->name('produk.show');
Route::get('/produk_more', [productController::class, 'Showmore'])->name('produk.more');
Route::get('/produk_filter', [productController::class, 'filter'])->name('produk.filter');

//category
Route::get('/leo', [sessionproduk::class, 'kategori'])->name('tes');

//contact
Route::post('contact/process', [ContactController::class, 'contact'])->name('contact.process');

//tes policy term
Route::get('term', [AuthorDashboard::class, 'leo'])->name('term.policy');

// untuk cart
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

//subscription
Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

