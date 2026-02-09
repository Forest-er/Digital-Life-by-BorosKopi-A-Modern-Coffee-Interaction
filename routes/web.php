<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\productController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\daftarController;

Route::get('/', [dashboardController::class, 'welcome'])->name('home');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/register', [daftarController::class, 'create'])->name('admin.register');
    Route::post('/admin/register', [daftarController::class, 'store'])->name('admin.register.store');
    Route::get('/order', [orderController::class, 'index'])->name('order');
    Route::get('/transaction', [orderController::class, 'Transaction'])->name('transaction');
    Route::get('/product/menu', [productController::class, 'index'])->name('product.menu');
    Route::get('/order/detail/{id}', [orderController::class, 'show'])->name('order.detail');
    Route::post('/order/update/{id}', [orderController::class, 'update'])->name('order.update');
    Route::get('product/add', [productController::class, 'create'])->name('product.add');
    Route::post('/product/store', [productController::class, 'store'])->name('product.store');
    Route::delete('/product/destroy/{id}', [productController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/edit/{id}', [productController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [productController::class, 'update'])->name('product.update');
    Route::delete('/order/destroy/{id}', [orderController::class, 'destroy'])->name('order.destroy');
    Route::get('/categories/add', [productController::class, 'kategori'])->name('categories.tambah');
    Route::post('/categories/store', [productController::class, 'kategoriInsert'])->name('categories.add');
    Route::delete('/categories/destroy/{id}', [productController::class, 'kategoriDelete'])->name('categories.delete');
    Route::get('/admin/register', function(){return view('auth.register');})->name('admin.register');
    Route::get('/export-pdf', [orderController::class, 'exportPdf'])->name('export.pdf');
});
Route::get('/order/add', [customerController::class, 'index'])->name('order.add');
Route::post('/customer/store', [customerController::class, 'store'])->name('customer.store');
route::post('/customer/storeStep2', [customerController::class, 'storeStep2'])->name('customer.storeStep2');
Route::post('/customer/storeStep3', [customerController::class, 'storeStep3'])->name('customer.storeStep3');
Route::get('/order/whatsapp/{order_id}', [customerController::class, 'sendToWhatsapp'])->name('order.whatsapp');
Route::delete('/customer/destroy', [customerController::class, 'destroy'])->name('customer.destroy');

require __DIR__.'/auth.php';
