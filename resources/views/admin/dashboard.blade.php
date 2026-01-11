@extends('layouts.admin')

@section('header', 'Ringkasan Toko')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full text-blue-500 mr-4">
                <i class="fas fa-cookie-bite fa-2x"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 uppercase">Total Varian Roti</p>
                <p class="text-3xl font-bold">{{ $totalProduk }}</p>
            </div>
        </div>
        <a href="{{ route('products.index') }}" class="text-blue-500 text-sm mt-4 block hover:underline italic">Lihat detail →</a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full text-green-500 mr-4">
                <i class="fas fa-users fa-2x"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 uppercase">Total Pelanggan</p>
                <p class="text-3xl font-bold">{{ $totalUser }}</p>
            </div>
        </div>
        <p class="text-gray-400 text-sm mt-4 italic">User terdaftar di database</p>
    </div>
</div>

<div class="mt-8 bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold mb-4">Shortcut Cepat</h3>
    <div class="flex gap-4">
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Roti Baru
        </a>
        <a href="/" target="_blank" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
            Lihat Halaman Toko (User)
        </a>
    </div>
</div>
@endsection