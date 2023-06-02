<?php

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


use Modules\Product\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index'); // first page

Route::prefix('product')->group(function() {
    Route::get('/create', [ProductController::class, 'store'])->name('product.store');
});
