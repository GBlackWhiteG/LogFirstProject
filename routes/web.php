<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('signup', [AuthController::class, 'signup'])->name('user.signup')->middleware('guest');
Route::post('signup', [AuthController::class, 'register'])->name('user.register')->middleware('guest');
Route::get('login', [AuthController::class, 'login'])->name('user.login')->middleware('guest');
Route::post('login', [AuthController::class, 'auth'])->name('user.auth')->middleware('guest');

Route::get('logout', [LogoutController::class, 'logout'])->name('user.logout')->middleware('auth');


Route::get('/', [ProductController::class, 'index'])->name('product.index')->middleware('auth');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show')->middleware('auth');
Route::patch('/product/{product}/buy', [ProductController::class, 'buy'])->name('product.buy')->middleware('auth');

Route::get('/orders', [OrderController::class, 'index'])->name('order.index')->middleware('auth');
