<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/woods', [WoodController::class, 'index'])->name('woods');
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/contacts', function () { return view('contacts'); });
Route::get('/woods/{id}', [WoodController::class, 'show'])->name('woods.show');


