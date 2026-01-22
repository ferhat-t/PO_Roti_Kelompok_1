@extends('layouts.app')

@section('title', 'Kelola Produk - Admin NeedRoti')

@section('content')

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-box"></i> Kelola Produk</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

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
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>
                                {{-- ✅ FIXED: Ganti path dari images/products ke storage --}}
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     width="60" height="60" 
                                     style="object-fit: cover;" 
                                     class="rounded"
                                     onerror="this.src='https://via.placeholder.com/60x60?text=No+Image'">
                            </td>
                            <td>
                                <strong>{{ $product->name }}</strong><br>
                                <small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                            </td>
                            <td>
                                <strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                            </td>
                            <td>
                                <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }} fs-6">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td>
                                @if($product->stock > 0)
                                    <span class="badge bg-success">Tersedia</span>
                                @else
                                    <span class="badge bg-danger">Habis</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted">Belum ada produk</p>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Produk Pertama
                                </a>
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