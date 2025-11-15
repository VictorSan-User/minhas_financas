<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginSubmtit')->name('login.submit');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerSubmit')->name('register.submit');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('user.dashboard');
});
