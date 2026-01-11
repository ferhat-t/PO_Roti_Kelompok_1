<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('product')->where('user_id', $user->id)->get();

        return view('cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['nullable', 'integer', 'min:1'],
            'note' => ['nullable', 'string'],
        ]);

        $user = Auth::user();
        $quantity = $data['quantity'] ?? 1;

        $cart = Cart::where('user_id', $user->id)
            ->where('product_id', $data['product_id'])
            ->first();

        if ($cart) {
            $cart->quantity += $quantity;
            if (isset($data['note'])) {
                $cart->note = $data['note'];
            }
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $data['product_id'],
                'quantity' => $quantity,
                'note' => $data['note'] ?? null,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, Cart $cart)
    {
        $this->authorizeCartOwner($cart);

        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart->update(['quantity' => $data['quantity']]);

        return back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    public function destroy(Cart $cart)
    {
        $this->authorizeCartOwner($cart);

        $cart->delete();

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    protected function authorizeCartOwner(Cart $cart)
    {
        $user = Auth::user();
        if ($cart->user_id !== $user->id) {
            abort(403);
        }
    }
}
