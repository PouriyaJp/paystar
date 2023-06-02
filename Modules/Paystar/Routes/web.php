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

use Modules\Paystar\Http\Controllers\PaystarController;

Route::prefix('paystar')->group(function() {
    Route::get('/callback', [PaystarController::class, 'callback'])->name('paystar.callback');
    Route::post('/callback', [PaystarController::class, 'verify'])->name('paystar.verify');
});
