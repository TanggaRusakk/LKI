<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/woods', [WoodController::class, 'index'])->name('woods');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/contacts', function () { return view('contacts'); })->name('contacts');
Route::get('/woods/{id}', [WoodController::class, 'show'])->name('woods.show');


