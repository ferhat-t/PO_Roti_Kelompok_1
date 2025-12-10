<?php

use Illuminate\Support\Facades\Route;

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
