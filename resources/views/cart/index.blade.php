<!-- resources/views/cart/index.blade.php -->
@extends('layouts.app')

@section('title', 'Keranjang Belanja - NeedRoti')

@section('content')

<div class="container py-5">
    <h2 class="mb-4">
        <i class="fas fa-shopping-cart"></i> Keranjang Belanja
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

    @if(!empty($cart))
        <div class="row">
            <!-- Cart Items -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-list"></i> Item dalam Keranjang</h5>
                    </div>
                    <div class="card-body">
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $item)
                            @php $total += $item['price'] * $item['quantity']; @endphp
                            
                            <div class="row mb-3 pb-3 border-bottom align-items-center">
                                <!-- Product Image - PERBAIKAN DI SINI -->
                                <div class="col-md-2">
                                    @if(isset($item['image']) && $item['image'])
                                        <!-- Gunakan asset dengan storage -->
                                        <img src="{{ asset('storage/' . $item['image']) }}" 
                                             class="img-fluid rounded product-image-small" 
                                             alt="{{ $item['name'] }}"
                                             onerror="this.src='https://via.placeholder.com/100x100?text=No+Image'"
                                             style="width: 100px; height: 100px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/100x100?text=No+Image" 
                                             class="img-fluid rounded product-image-small" 
                                             alt="{{ $item['name'] }}"
                                             style="width: 100px; height: 100px; object-fit: cover;">
                                    @endif
                                </div>
                                
                                <!-- Product Info -->
                                <div class="col-md-4">
                                    <h5 class="mb-1">{{ $item['name'] }}</h5>
                                    <p class="text-muted mb-0">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                
                                <!-- Quantity -->
                                <div class="col-md-3">
                                    <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" 
                                               name="quantity" 
                                               value="{{ $item['quantity'] }}" 
                                               class="form-control form-control-sm" 
                                               min="1" 
                                               max="99"
                                               style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-outline-primary ms-2" title="Update">
                                            <i class="fas fa-sync"></i>
                                        </button>
                                    </form>
                                </div>
                                
                                <!-- Subtotal & Remove -->
                                <div class="col-md-2 text-end">
                                    <strong class="text-primary">
                                        Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                    </strong>
                                </div>
                                
                                <div class="col-md-1 text-end">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Hapus produk ini dari keranjang?')"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-calculator"></i> Ringkasan Belanja</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal ({{ count($cart) }} item)</span>
                            <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <h5>Total</h5>
                            <h5 class="text-primary" id="cart-total">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </h5>
                        </div>
                        
                        <div class="d-grid gap-2">
                            @auth
                                <!-- Jika sudah login, bisa langsung checkout -->
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-check-circle"></i> Checkout
                                </a>
                            @else
                                <!-- Jika belum login, tampilkan tombol login -->
                                <div class="alert alert-warning mb-3">
                                    <i class="fas fa-info-circle"></i> Silakan login terlebih dahulu untuk melanjutkan checkout
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-success btn-lg">
                                    <i class="fas fa-sign-in-alt"></i> Login untuk Checkout
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-outline-success">
                                    <i class="fas fa-user-plus"></i> Belum punya akun? Daftar
                                </a>
                            @endauth
                            
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-shopping-bag"></i> Lanjut Belanja
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="card mt-3 bg-light">
                    <div class="card-body">
                        <h6><i class="fas fa-truck"></i> Informasi Pengiriman</h6>
                        <p class="small mb-0">
                            Pengiriman dan biaya akan dikonfirmasi setelah checkout melalui WhatsApp.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty Cart -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm text-center">
                    <div class="card-body py-5">
                        <i class="fas fa-shopping-cart fa-5x text-muted mb-4"></i>
                        <h4>Keranjang Anda Kosong</h4>
                        <p class="text-muted mb-4">
                            Belum ada produk di keranjang Anda. Yuk mulai belanja!
                        </p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-shopping-bag"></i> Belanja Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection