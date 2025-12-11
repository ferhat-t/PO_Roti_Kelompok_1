<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::get('/sign', function () {
    return view('auth.sign');
})->name('sign');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// route bawaan welcome
Route::get('/', function () {
    return view('welcome');


});



Route::get('/location', [LocationController::class, 'index'])->name('location.index');
