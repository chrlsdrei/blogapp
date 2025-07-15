<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'welcome')
    ->name('welcome');

Route::view('/register', 'components.auth.register')
    ->name('register');

Route::view('/login', 'components.auth.login')
    ->name('login');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

