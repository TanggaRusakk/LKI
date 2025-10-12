<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/woods', [WoodController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/contacts', function () { return view('contacts'); });



