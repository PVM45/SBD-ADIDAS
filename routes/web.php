<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
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
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories', [CategoryController::class, 'indexx'])->name('categories.index');
    Route::get('/dashboard', [CategoryController::class, 'index']);
    Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');
Route::get('/subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('/subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::get('products/create', [ProductController::class,'create'])->name('admin.products.create');
Route::post('products',[ProductController::class,'store'] )->name('admin.products.store');