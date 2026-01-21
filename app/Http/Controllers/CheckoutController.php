<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Constructor - Middleware untuk memastikan user sudah login
     */

    /**
     * Tampilkan halaman checkout
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('products.index')
                ->with('error', 'Keranjang Anda kosong!');
        }

        return view('checkout.index', compact('cart'));
    }

    /**
     * Proses checkout dan buat order
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string'
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index')
                ->with('error', 'Keranjang Anda kosong!');
        }

        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Buat order dengan user_id dari user yang login
        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
            'status' => 'pending'
        ]);

        // Buat order items dan kurangi stok
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);

            // Kurangi stok produk
            $product = Product::find($id);
            if ($product) {
                $product->decreaseStock($item['quantity']);
            }
        }

        // Hapus cart dari session
        session()->forget('cart');

        return redirect()->route('checkout.success', $order->id);
    }

    /**
     * Tampilkan halaman sukses setelah checkout
     */
    public function success($id)
    {
        $order = Order::with('orderItems.product')
            ->where('id', $id)
            ->where('user_id', Auth::id()) // Pastikan order milik user yang login
            ->firstOrFail();
            
        return view('checkout.success', compact('order'));
    }
}