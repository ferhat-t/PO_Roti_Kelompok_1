<!-- resources/views/checkout/success.blade.php -->
@extends('layouts.app')

@section('title', 'Pesanan Berhasil - NeedRoti')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body text-center py-5">
                    <!-- Success Icon -->
                    <i class="fas fa-check-circle success-icon mb-4"></i>
                    
                    <h2 class="mb-3">Pesanan Berhasil Dibuat!</h2>
                    <p class="lead">Terima kasih atas pesanan Anda</p>

                    <!-- Order Info -->
                    <div class="alert alert-success mt-4">
                        <h5 class="alert-heading">
                            <i class="fas fa-receipt"></i> Nomor Pesanan: <strong>#{{ $order->id }}</strong>
                        </h5>
                        <hr>
                        <p class="mb-0">
                            <strong>Total:</strong> 
                            <span class="text-primary h5">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                        </p>
                    </div>

                    <div class="mt-4">
                        <h5>Informasi Kontak:</h5>
                        <p class="mb-1">
                            <i class="fas fa-user"></i> <strong>Nama:</strong> {{ $order->customer_name }}
                        </p>
                        <p class="mb-1">
                            <i class="fas fa-phone"></i> <strong>Telepon:</strong> {{ $order->phone }}
                        </p>
                        @if($order->address)
                            <p class="mb-0">
                                <i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $order->address }}
                            </p>
                        @endif
                    </div>

                    <hr>

                    <h5 class="mb-3">Detail Pesanan:</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Harga</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="text-end">
                                        <strong>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th colspan="3" class="text-end">TOTAL:</th>
                                <th class="text-primary">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="alert alert-warning mt-4">
                    <i class="fas fa-info-circle"></i> 
                    <strong>Catatan:</strong> Admin kami akan segera menghubungi Anda via WhatsApp untuk konfirmasi pembayaran dan detail pengiriman.
                </div>

                <div class="d-grid gap-2 mt-4">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', '(0274) 4435707') }}" 
                       class="btn btn-success btn-lg" target="_blank">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami via WhatsApp
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-bag"></i> Belanja Lagi
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-home"></i> Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection