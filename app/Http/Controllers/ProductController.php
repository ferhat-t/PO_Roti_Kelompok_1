<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan semua produk
     */
    public function index()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('products.index', compact('products'));
    }

    /**
     * Tampilkan detail produk
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}