<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/order', function () {
        return view('ordered.order');
    })->name('order');
    Route::get('/transaction', function () {
        return view('ordered.transaction');
    })->name('transaction');
    Route::get('/product/menu', function () {
        return view('product.menu');
    })->name('product.menu');
});

require __DIR__.'/auth.php';
