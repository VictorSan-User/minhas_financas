<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/login', 'loginSubmtit')->name('login.submit');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerSubmit')->name('register.submit');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('user.dashboard');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index')->name('events.index');
    Route::get('/events/create', 'create')->name('events.create');
    Route::post('/events', 'store')->name('events.store');
});

Route::controller(MetaController::class)->group(function(){
    Route::get('/meta', 'index')->name('meta.index');
    Route::get('/meta/create', 'create')->name('meta.create');
    Route::post('meta', 'store')->name('meta.store');
});
