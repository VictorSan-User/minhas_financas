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
    Route::get('/events/edit/{id}', 'edit')->name('events.edit');
    Route::put('/events/update/{id}', 'update')->name('events.update');
    Route::get('/events/destroy/confirm/{id}', 'destroy_confirm')->name('events.destroy_confirm');
    Route::delete('/events/destroy/{id}', 'destroy')->name('events.destroy');
});

Route::controller(MetaController::class)->group(function(){
    Route::get('/meta', 'index')->name('meta.index');
    Route::get('/meta/create', 'create')->name('meta.create');
    Route::post('/meta', 'store')->name('meta.store');
    Route::get('/edit/{id}', 'edit')->name('meta.edit');
    Route::put('/meta/update/{id}', 'update')->name('meta.update');
    Route::get('/meta/destroy/{id}', 'destroy_confirm')->name('meta.destroy_confirm');
    Route::delete('/meta/destroy/{id}', 'destroy')->name('meta.destroy');
});
