<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Register
Route::get('/sign', [AuthController::class, 'showRegister'])->name('sign');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Logout (POST ONLY)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/pre-order', function () {
    return view('preorder');
})->name('preorder');

Route::get('/location', [LocationController::class, 'index'])->name('location.index');
