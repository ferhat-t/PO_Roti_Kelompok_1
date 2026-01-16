<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard admin
     */
    public function index()
    {
        // Cek apakah user adalah admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Akses ditolak. Anda bukan admin.');
        }

        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total');
        $pendingOrders = Order::where('status', 'pending')->count();
        $products = Product::count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'pendingOrders',
            'products'
        ));
    }
}