<?php

use App\Http\Controllers\{CarController, HomeController, LoginController, SignupController};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signup', [SignupController::class, 'create'])->name('signup.create');
Route::get('/login', [LoginController::class, 'create'])->name('login.create');

Route::get('car/search', [CarController::class, 'search'])->name('car.search');
Route::get('car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
Route::resource('car', CarController::class);