<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

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

    // Profile route
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

    Route::get('/create-post', [DashboardController::class, 'index'])->name('create-post');

    // Comments routes (nested under posts)
    Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/posts/{post:slug}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Only logged-in users can perform these actions.
    Route::resource('posts', PostController::class)
        ->except(['index', 'show'])
        ->parameters(['posts' => 'post:slug']);
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest admin routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/register', [AdminController::class, 'showRegister'])->name('register');
        Route::post('/register', [AdminController::class, 'register']);
        Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminController::class, 'login']);
    });

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/posts/{post}/approve', [AdminController::class, 'approvePost'])->name('posts.approve');
        Route::post('/posts/{post}/decline', [AdminController::class, 'declinePost'])->name('posts.decline');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
