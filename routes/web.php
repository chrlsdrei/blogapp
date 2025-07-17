<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome')
    ->name('welcome');

Route::resource('posts', PostController::class)
    ->only(['index', 'show'])
    ->parameters(['posts' => 'post:slug']);

Route::middleware('guest')->group(function () {
    Route::view('/register', 'components.auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::view('/login', 'components.auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Only logged-in users can perform these actions.
    Route::resource('posts', PostController::class)->except(['index', 'show']);
});
