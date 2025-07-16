<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome')
    ->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::view('/register', 'components.auth.register')
    ->name('register');

Route::view('/login', 'components.auth.login')
    ->name('login');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/login', [AuthController::class, 'login']);
