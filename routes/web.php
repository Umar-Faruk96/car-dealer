<?php

use App\Http\Controllers\{HomeController, SignupController, LoginController};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/signup', [SignupController::class, 'create'])->name('signup.create');
Route::get('/login', [LoginController::class, 'create'])->name('login.create');