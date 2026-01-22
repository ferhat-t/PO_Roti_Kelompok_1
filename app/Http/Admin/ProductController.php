<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Tampilkan semua produk
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Tampilkan form tambah produk
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Simpan produk baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120' // 5MB
        ]);

        // ✅ Upload ke storage/app/public/products
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Generate nama file unik
            $filename = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            
            // Simpan ke storage/app/public/products
            $imagePath = $image->storeAs('products', $filename, 'public');
        }

        // Simpan produk
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath // Simpan path: products/xxx.jpg
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit produk
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update produk
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);

        // ✅ Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Upload gambar baru
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('products', $filename, 'public');
            
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk
     */
    public function destroy(Product $product)
    {
        // ✅ Hapus gambar dari storage
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}