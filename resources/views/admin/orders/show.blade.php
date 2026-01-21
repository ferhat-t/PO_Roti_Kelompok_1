@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->id . ' - Admin NeedRoti')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-receipt"></i> Detail Pesanan #{{ $order->id }}
                    </h5>
                    <div>
                        <a href="{{ route('admin.orders.download', $order) }}" 
                           class="btn btn-sm btn-success" 
                           target="_blank">
                            <i class="fas fa-download"></i> Download
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-light">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Informasi Pelanggan & Pesanan -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">
                                <i class="fas fa-user"></i> Informasi Pelanggan
                            </h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="100"><strong>Nama:</strong></td>
                                    <td>{{ $order->customer_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Telepon:</strong></td>
                                    <td>
                                        <a href="https://wa.me/+62{{ $order->getWhatsappNumber() }}" 
                                           target="_blank" 
                                           class="text-success text-decoration-none">
                                            <i class="fab fa-whatsapp"></i> {{ $order->phone }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat:</strong></td>
                                    <td>{{ $order->address ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">
                                <i class="fas fa-info-circle"></i> Informasi Pesanan
                            </h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="100"><strong>Tanggal:</strong></td>
                                    <td>{{ $order->created_at->format('d F Y, H:i') }} WIB</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" 
                                                    class="form-select form-select-sm d-inline-block" 
                                                    onchange="this.form.submit()"
                                                    style="width: auto;">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                    Processing
                                                </option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                    Completed
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Total:</strong></td>
                                    <td>
                                        <span class="text-primary h5">
                                            Rp {{ number_format($order->total, 0, ',', '.') }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Item Pesanan -->
                    <h6 class="text-muted mb-3"><i class="fas fa-list"></i> Item Pesanan</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('images/products/' . $item->product->image) }}" 
                                                 width="50" height="50" 
                                                 class="rounded me-2" 
                                                 style="object-fit: cover;"
                                                 onerror="this.src='https://via.placeholder.com/50x50?text=Product'">
                                            <strong>{{ $item->product->name }}</strong>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">
                                        <strong>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <th colspan="3" class="text-end">TOTAL:</th>
                                    <th class="text-end text-primary">
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <a href="https://wa.me/+62{{ $order->getWhatsappNumber() }}?text=Halo%20{{ urlencode($order->customer_name) }},%20pesanan%20Anda%20%23{{ $order->id }}%20dengan%20total%20Rp%20{{ number_format($order->total, 0, ',', '.') }}%20telah%20kami%20terima.%20Silakan%20lakukan%20pembayaran." 
                           class="btn btn-success" 
                           target="_blank">
                            <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                        </a>
                        <a href="{{ route('admin.orders.download', $order) }}" 
                           class="btn btn-primary" 
                           target="_blank">
                            <i class="fas fa-print"></i> Print / Save PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection