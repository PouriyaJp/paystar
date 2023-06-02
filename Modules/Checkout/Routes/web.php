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

use Modules\Checkout\Http\Controllers\CheckoutController;

Route::prefix('checkout')->group(function() {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/payment', [CheckoutController::class, 'gateway'])->name('checkout.payment');
});
