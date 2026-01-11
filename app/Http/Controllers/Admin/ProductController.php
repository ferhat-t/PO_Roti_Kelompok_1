<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar roti
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Form tambah roti
    public function create()
    {
        return view('admin.products.create');
    }

    // Simpan roti ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Roti berhasil ditambahkan!');
    }

    // ... (fungsi lainnya bisa menyusul)
}