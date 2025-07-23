<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}/payment', [ProductController::class, 'paypalPaymentLink'])->name('paypal.paymentLink');
Route::get('/products/payment/success', [ProductController::class, 'paypalPaymentSuccess'])->name('paypal.paymentSuccess');
Route::get('/products/payment/cancel', [ProductController::class, 'paypalPaymentCancel'])->name('paypal.paymentCancel');