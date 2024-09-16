<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::patch('/product/{product}/buy', [ProductController::class, 'buy'])->name('product.buy');

Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
