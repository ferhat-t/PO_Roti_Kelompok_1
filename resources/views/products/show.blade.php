<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('title', $product->name . ' - NeedRoti')

@section('content')

<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <!-- Product Detail -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                {{-- ✅ FIXED: Ganti path dari images/products ke storage --}}
                <img src="{{ asset('storage/' . $product->image) }}" 
                     class="card-img-top rounded shadow" 
                     alt="{{ $product->name }}"
                     style="height: 400px; object-fit: cover;"
                     onerror="this.src='https://via.placeholder.com/600x400?text={{ urlencode($product->name) }}'">
            </div>
        </div>
        
        <div class="col-md-6">
            <h2 class="mb-3">{{ $product->name }}</h2>
            <hr>
            
            <div class="mb-4">
                <h3 class="text-primary mb-3">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </h3>
                
                <p class="lead">{{ $product->description }}</p>
            </div>
            
            <div class="mb-4">
                <h5>Ketersediaan Stok:</h5>
                <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }} fs-6">
                    @if($product->stock > 10)
                        <i class="fas fa-check-circle"></i> Tersedia ({{ $product->stock }} unit)
                    @elseif($product->stock > 0)
                        <i class="fas fa-exclamation-triangle"></i> Stok Terbatas ({{ $product->stock }} unit)
                    @else
                        <i class="fas fa-times-circle"></i> Stok Habis
                    @endif
                </span>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                @csrf
                <div class="d-grid gap-2">
                    <button type="submit" 
                            class="btn btn-primary btn-lg" 
                            {{ $product->stock == 0 ? 'disabled' : '' }}>
                        <i class="fas fa-cart-plus"></i> 
                        {{ $product->stock > 0 ? 'Tambah ke Keranjang' : 'Stok Habis' }}
                    </button>
                    
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Kembali ke Produk
                    </a>
                </div>
            </form>

            <!-- Product Info -->
            <div class="card mt-4 bg-light">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-info-circle"></i> Informasi Produk</h5>
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-check text-success"></i> Produk fresh setiap hari</li>
                        <li><i class="fas fa-check text-success"></i> Bahan berkualitas premium</li>
                        <li><i class="fas fa-check text-success"></i> Halal dan higienis</li>
                        <li><i class="fas fa-check text-success"></i> Kemasan aman</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection