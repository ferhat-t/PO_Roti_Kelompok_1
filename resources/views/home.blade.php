<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home - NeedRoti')

@section('content')

<!-- Hero Section -->
 @php
    // Encode path untuk menangani spasi
    $heroImagePath = asset('images/bg-depan/hero-bg.png');
    // Atau bisa juga menggunakan str_replace untuk mengganti spasi dengan %20
    $heroImagePath = str_replace(' ', '%20', $heroImagePath);
@endphp
<div class="hero-section" style="background-image: url('{{ $heroImagePath }}');">
    <div class="hero-overlay"></div>
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-3">ALL AMAZING BREAD & CAKE</h1>
        <p class="lead fs-4 mb-4">Rasakan Sajian Roti dan Pastry yang Luar Biasa</p>
        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg">
            <i class="fas fa-shopping-bag"></i> Lihat Produk Kami
        </a>
    </div>
</div>

<!-- Features Section -->
<div class="container py-5">
    <h2 class="text-center mb-5">Mengapa Memilih needroTI?</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="feature-icon">
                <i class="fas fa-bread-slice"></i>
            </div>
            <h4 class="mb-3">Bahan Berkualitas</h4>
            <p class="text-muted">Menggunakan bahan pilihan terbaik untuk setiap produk kami. Kesegaran dan kualitas adalah prioritas utama.</p>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-icon">
                <i class="fas fa-cookie-bite"></i>
            </div>
            <h4 class="mb-3">Rasa Lezat</h4>
            <p class="text-muted">Cita rasa yang tak terlupakan di setiap gigitan. Resep rahasia yang telah teruji dan disukai banyak pelanggan.</p>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-icon">
                <i class="fas fa-heart"></i>
            </div>
            <h4 class="mb-3">Dibuat dengan Cinta</h4>
            <p class="text-muted">Setiap produk dibuat dengan penuh perhatian dan kasih sayang untuk kepuasan Anda.</p>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-4">Tentang needroTI</h2>
                <p class="lead">needroTI adalah toko roti dan pastry terpercaya yang telah melayani ribuan pelanggan dengan produk berkualitas tinggi.</p>
                <p>Kami berkomitmen untuk selalu memberikan yang terbaik dengan menggunakan bahan-bahan premium dan resep yang telah teruji. Setiap produk dibuat fresh setiap hari untuk memastikan kesegaran maksimal.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-arrow-right"></i> Belanja Sekarang
                </a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/about-image.jpg') }}" alt="About NeedRoti" class="img-fluid rounded shadow" 
                     onerror="this.src='https://via.placeholder.com/600x400?text=NeedRoti'">
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="container py-5">
    <div class="card bg-primary text-white shadow-lg">
        <div class="card-body text-center py-5">
            <h2 class="mb-4">Siap untuk Mencoba?</h2>
            <p class="lead mb-4">Pesan sekarang dan nikmati kelezatan roti dan pastry kami!</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-shopping-cart"></i> Belanja Sekarang
                </a>
                <a href="https://wa.me/62882006107997" class="btn btn-outline-light btn-lg" target="_blank">
                    <i class="fab fa-whatsapp"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>

@endsection