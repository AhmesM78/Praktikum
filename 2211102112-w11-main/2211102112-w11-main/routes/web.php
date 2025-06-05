<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CarController;

Route::get('/', function () {
    return redirect('/cars');
});

Route::resource('cars', CarController::class);
