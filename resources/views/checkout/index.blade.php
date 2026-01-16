<!-- resources/views/checkout/index.blade.php -->
@extends('layouts.app')

@section('title', 'Checkout - NeedRoti')

@section('content')

<div class="container py-5">
    <h2 class="mb-4">
        <i class="fas fa-credit-card"></i> Checkout
    </h2>

    <div class="row">
        <!-- Form Informasi Customer -->
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user"></i> Informasi Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">
                                <i class="fas fa-user"></i> Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('customer_name') is-invalid @enderror" 
                                   id="customer_name"
                                   name="customer_name" 
                                   value="{{ old('customer_name', auth()->user()->name ?? '') }}" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone"></i> Nomor Telepon <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone"
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="08xx-xxxx-xxxx"
                                   required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fab fa-whatsapp text-success"></i> 
                                Kami akan menghubungi Anda via WhatsApp untuk konfirmasi pembayaran
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Alamat Lengkap
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address"
                                      name="address" 
                                      rows="3" 
                                      placeholder="Masukkan alamat lengkap (opsional)">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> 
                            <strong>Catatan:</strong> Setelah checkout, admin kami akan menghubungi Anda via WhatsApp untuk konfirmasi pembayaran dan detail pengiriman.
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-check-circle"></i> Buat Pesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ringkasan Pesanan -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-shopping-bag"></i> Ringkasan Pesanan</h5>
                </div>
                <div class="card-body">
                    @php $total = 0; @endphp
                    
                    @foreach($cart as $id => $item)
                        @php $total += $item['price'] * $item['quantity']; @endphp
                        
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/' . $item['image']) }}" 
                                     class="rounded me-2" 
                                     style="width: 50px; height: 50px; object-fit: cover;"
                                     alt="{{ $item['name'] }}"
                                     onerror="this.src='https://via.placeholder.com/50x50?text=Product'">
                                <div>
                                    <strong>{{ $item['name'] }}</strong><br>
                                    <small class="text-muted">
                                        {{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </small>
                                </div>
                            </div>
                            <span class="text-primary">
                                <strong>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</strong>
                            </span>
                        </div>
                    @endforeach

                    <hr class="my-3">

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal ({{ count($cart) }} item)</span>
                        <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                    </div>

                    <hr class="my-3">

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Total</h5>
                        <h4 class="text-primary mb-0">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="card mt-3 bg-light">
                <div class="card-body">
                    <h6><i class="fas fa-credit-card"></i> Metode Pembayaran</h6>
                    <p class="small mb-0">
                        <i class="fas fa-money-bill-wave text-success"></i> Transfer Bank<br>
                        <i class="fab fa-whatsapp text-success"></i> Konfirmasi via WhatsApp
                    </p>
                </div>
            </div>

            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-3">
                <i class="fas fa-arrow-left"></i> Kembali ke Keranjang
            </a>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
document.getElementById('checkout-form').addEventListener('submit', function(e) {
    // Optional: Add form validation here
    if (!FormValidator.validateCheckout(this)) {
        e.preventDefault();
    }
});
</script>
@endsection