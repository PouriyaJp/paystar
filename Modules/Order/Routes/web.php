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

use Modules\Order\Http\Controllers\OrderController;

Route::prefix('order')->group(function() {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::post('/create/{product}', [OrderController::class, 'store'])->name('order.store');
});
