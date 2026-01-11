<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MyOrderController;
use Illuminate\Support\Facades\Auth;

// Group Route khusus Admin
Route::middleware(['auth', 'AdminMiddleware'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class); // Ini akan otomatis membuat name 'products.index', 'products.create', dll.
});
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
    $products = \App\Models\Product::where('is_active', true)->take(8)->get();
    return view('welcome', compact('products'));
})->name('welcome');

Route::get('/pre-order', function () {
    return view('preorder');
})->name('preorder');

Route::get('/location', function () {
    return view('location');
})->name('location.index');

// Cart routes (requires auth)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
});


Route::get('/', [MyOrderController::class, 'index']);


// Optional views for checkout (placeholder)
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
