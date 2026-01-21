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
        <h1 class="display-3 fw-bold mb-3">ALL AMAZING BREAD & PASTRY</h1>
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

<!-- Jadwal Pre-Order Section -->
<div class="bg-light py-5">
    <div id="jadwal-po">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">JADWAL PRE-ORDER</h2>
            <p class="text-muted">Pilih sesi pemesanan yang sesuai dengan kebutuhan Anda</p>
        </div>

        <div class="row g-4">
            <!-- Sesi Pagi -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-sun fa-3x text-warning"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Sesi Pagi</h4>
                        <div class="mb-4">
                            <h5 class="text-primary mb-2">07:00 - 10:00 WIB</h5>
                            <p class="text-muted small mb-3">Pesan H-1 sebelum jam 18:00</p>
                        </div>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Roti fresh pagi hari</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Cocok untuk sarapan</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Stok terlengkap</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sesi Siang -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-lift border-primary" style="border-width: 2px !important;">
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-primary px-3 py-2">TERPOPULER</span>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-cloud-sun fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Sesi Siang</h4>
                        <div class="mb-4">
                            <h5 class="text-primary mb-2">12:00 - 15:00 WIB</h5>
                            <p class="text-muted small mb-3">Pesan H-1 sebelum jam 20:00</p>
                        </div>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Perfect untuk makan siang</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Produk masih hangat</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Varian lengkap</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sesi Sore -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-moon fa-3x text-info"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Sesi Sore</h4>
                        <div class="mb-4">
                            <h5 class="text-primary mb-2">16:00 - 19:00 WIB</h5>
                            <p class="text-muted small mb-3">Pesan H-1 sebelum jam 22:00</p>
                        </div>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Pas untuk camilan sore</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Ambil pulang kerja</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Praktis & efisien</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Tambahan -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="alert alert-info border-0 shadow-sm">
                    <div class="row align-items-center">
                        <div class="col-md-1 text-center">
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <h5 class="alert-heading mb-2">Informasi Penting:</h5>
                            <ul class="mb-0 ps-3">
                                <li>Pre-order minimal H-1 sesuai batas waktu masing-masing sesi</li>
                                <li>Pembayaran dilakukan saat pemesanan untuk konfirmasi order</li>
                                <li>Pengambilan sesuai jam sesi yang dipilih</li>
                                <li>Hubungi kami untuk pemesanan dalam jumlah besar (min. 50 pcs)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}
</style>

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