<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/woods', function () { return view('woods'); });
Route::get('/services', function () { return view('services'); });
Route::get('/contacts', function () { return view('contacts'); });



