<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MyOrderController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', 1)
            ->limit(8)
            ->get();

        return view('home', compact('products'));
    }
}
