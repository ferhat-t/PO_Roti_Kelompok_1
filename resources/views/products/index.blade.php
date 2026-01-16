<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title', 'Produk - NeedRoti')

@section('content')

<div class="container py-5">
    <h2 class="text-center mb-5">
        <i class="fas fa-shopping-bag"></i> Produk Kami
    </h2>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Products Grid -->
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ asset('images/products/' . $product->image) }}" 
                         class="card-img-top product-image" 
                         alt="{{ $product->name }}"
                         onerror="this.src='https://via.placeholder.com/300x250?text={{ urlencode($product->name) }}'">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($product->description, 80) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="h5 mb-0 text-primary">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                            <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                Stok: {{ $product->stock }}
                            </span>
                        </div>
                        
                        <div class="mt-3">
                            <a href="{{ route('products.show', $product) }}" 
                               class="btn btn-outline-primary btn-sm w-100 mb-2">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-primary btn-sm w-100" 
                                        {{ $product->stock == 0 ? 'disabled' : '' }}>
                                    <i class="fas fa-cart-plus"></i> 
                                    {{ $product->stock > 0 ? 'Tambah ke Keranjang' : 'Stok Habis' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle fa-3x mb-3 d-block"></i>
                    <h4>Belum Ada Produk Tersedia</h4>
                    <p>Silakan cek kembali nanti.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection