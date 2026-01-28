<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\productController;
use App\Http\Controllers\customerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/order', [orderController::class, 'index'])->name('order');
    Route::get('/transaction', [orderController::class, 'Transaction'])->name('transaction');
    Route::get('/product/menu', [productController::class, 'index'])->name('product.menu');
    Route::get('/order/detail/{id}', [orderController::class, 'show'])->name('order.detail');
    Route::post('/order/update/{id}', [orderController::class, 'update'])->name('order.update');
    Route::get('product/add', function(){return view('product.insertMenu');})->name('product.add');
    Route::post('/product/store', [productController::class, 'store'])->name('product.store');
    Route::delete('/product/destroy/{id}', [productController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/edit/{id}', [productController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [productController::class, 'update'])->name('product.update');
});
Route::get('/order/add', [customerController::class, 'index'])->name('order.add');
Route::post('/customer/store', [customerController::class, 'store'])->name('customer.store');
route::post('/customer/storeStep2', [customerController::class, 'storeStep2'])->name('customer.storeStep2');
Route::post('/customer/storeStep3', [customerController::class, 'storeStep3'])->name('customer.storeStep3');
Route::get('/order/whatsapp/{order_id}', [customerController::class, 'sendToWhatsapp'])->name('order.whatsapp');

require __DIR__.'/auth.php';
