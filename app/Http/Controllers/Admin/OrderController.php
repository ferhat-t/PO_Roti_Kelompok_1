<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private function checkAdmin()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Akses ditolak. Anda bukan admin.');
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $orders = Order::with('orderItems.product')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->checkAdmin();
        $order->load('orderItems.product');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $this->checkAdmin();
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function download(Order $order)
    {
        $this->checkAdmin();
        $order->load('orderItems.product');
        return view('admin.orders.download', compact('order'));
    }
}