<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');


});

Route::get('/location', [LocationController::class, 'index'])->name('location.index');
