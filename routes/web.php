<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'signup')->name('user.signup')->middleware('guest');
    Route::post('/signup', 'register')->name('user.register')->middleware('guest');
    Route::get('/login', 'login')->name('user.login')->middleware('guest');
    Route::post('/login', 'auth')->name('user.auth')->middleware('guest');

    Route::get('/logout', 'logout')->name('user.logout')->middleware('auth');
});

Route::controller(AdminController::class)->group(function () {
   Route::get('/admin', 'index')->name('admin.index')->middleware('admin');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/product/{product}', 'show')->name('product.show');
    Route::patch('/product/{product}/buy', 'buy')->name('product.buy')->middleware('auth');
});

Route::get('/orders', [OrderController::class, 'index'])->name('order.index')->middleware('auth');
Route::get('/orders/status/{order}', [OrderController::class, 'status'])->name('order.status')->middleware('admin');
