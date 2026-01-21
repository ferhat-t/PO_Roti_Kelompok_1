@extends('layouts.app')

@section('title', 'Kelola Pesanan - Admin NeedRoti')

@section('content')

<div class="container-fluid py-4">
    <h2 class="mb-4"><i class="fas fa-shopping-cart"></i> Kelola Pesanan</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Telepon</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td><strong>#{{ $order->id }}</strong></td>
                            <td>{{ $order->customer_name }}</td>
                            <td>
                                <a href="https://wa.me/+62{{ $order->getWhatsappNumber() }}" 
                                   target="_blank" 
                                   class="text-success text-decoration-none">
                                    <i class="fab fa-whatsapp"></i> {{ $order->phone }}
                                </a>
                            </td>
                            <td>
                                <strong class="text-primary">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </strong>
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" 
                                            class="form-select form-select-sm" 
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
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.orders.show', $order) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.orders.download', $order) }}" 
                                       class="btn btn-sm btn-success" 
                                       target="_blank"
                                       title="Download/Print">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="https://wa.me/+62{{ $order->getWhatsappNumber() }}?text=Halo%20{{ urlencode($order->customer_name) }},%20pesanan%20Anda%20%23{{ $order->id }}%20sedang%20diproses." 
                                       class="btn btn-sm btn-success" 
                                       target="_blank"
                                       title="WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted">Belum ada pesanan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>

@endsection