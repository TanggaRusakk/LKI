<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/woods', [WoodController::class, 'index'])->name('woods');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/contacts', function () { return view('contacts'); })->name('contacts');
Route::get('/woods/{id}', [WoodController::class, 'show'])->name('woods.show');

// Breeze Dashboard (after login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Protected Routes
Route::middleware('auth')->group(function () {
    // Profile Management
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.password.update');
    
    // User Reviews CRUD
    Route::resource('reviews', ReviewController::class);
});

// Admin Routes (hanya untuk admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    
    // Woods Management
    Route::resource('woods', \App\Http\Controllers\Admin\WoodController::class);
    
    // Services Management
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    
    // Users Management
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    
    // Reviews Management
    Route::get('/reviews', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{review}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');
});

require __DIR__.'/auth.php';
