<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Admin Dashboard - NeedRoti')

@section('content')

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col">
            <h2>
                <i class="fas fa-tachometer-alt"></i> Dashboard Admin
            </h2>
            <p class="text-muted">Selamat datang, {{ auth()->user()->name }}!</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2">Total Pesanan</h6>
                            <h2 class="mb-0">{{ $totalOrders }}</h2>
                            <small>Semua pesanan</small>
                        </div>
                        <i class="fas fa-shopping-cart fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-success text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2">Total Pendapatan</h6>
                            <h5 class="mb-0">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h5>
                            <small>Total penjualan</small>
                        </div>
                        <i class="fas fa-money-bill-wave fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-warning text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2">Pesanan Pending</h6>
                            <h2 class="mb-0">{{ $pendingOrders }}</h2>
                            <small>Perlu diproses</small>
                        </div>
                        <i class="fas fa-clock fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card bg-info text-white shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2">Total Produk</h6>
                            <h2 class="mb-0">{{ $products }}</h2>
                            <small>Produk aktif</small>
                        </div>
                        <i class="fas fa-box fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Quick Menu -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-bolt"></i> Menu Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-box text-primary"></i>
                            <strong>Kelola Produk</strong>
                            <span class="float-end badge bg-secondary">{{ $products }}</span>
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-shopping-cart text-success"></i>
                            <strong>Kelola Pesanan</strong>
                            <span class="float-end badge bg-warning">{{ $pendingOrders }} pending</span>
                        </a>
                        <a href="{{ route('admin.products.create') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-plus-circle text-info"></i>
                            <strong>Tambah Produk Baru</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-clock"></i> Aktivitas Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> 
                        Dashboard menampilkan statistik real-time dari website NeedRoti.
                    </div>

                    <div class="mb-3">
                        <strong>Status Sistem:</strong>
                        <ul class="list-unstyled mt-2">
                            <li>
                                <i class="fas fa-check-circle text-success"></i> 
                                Website Online
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success"></i> 
                                Database Connected
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success"></i> 
                                Payment System Ready
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tips Section -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h5><i class="fas fa-lightbulb text-warning"></i> Tips Admin</h5>
                    <ul class="mb-0">
                        <li>Selalu cek pesanan pending dan hubungi customer via WhatsApp</li>
                        <li>Update stok produk secara berkala</li>
                        <li>Download detail pesanan untuk keperluan pembayaran</li>
                        <li>Ubah status pesanan setelah customer melakukan pembayaran</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection