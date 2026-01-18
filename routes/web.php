<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/order', [orderController::class, 'index'])->name('order');
    Route::get('/transaction', function () {
        return view('ordered.transaction');
    })->name('transaction');
    Route::get('/product/menu', function () {
        return view('product.menu');
    })->name('product.menu');
    Route::get('/order/detail/{id}', [orderController::class, 'show'])->name('order.detail');
    Route::post('/order/update/{id}', [orderController::class, 'update'])->name('order.update');
});

require __DIR__.'/auth.php';
