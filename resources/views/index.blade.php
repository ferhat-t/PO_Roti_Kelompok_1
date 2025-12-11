@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="text-center mb-4">Store Locations – Semarang</h2>

    <div class="card p-4 shadow-sm w-75 mx-auto">
        
        <label class="form-label fw-bold">Pilih Cabang di Semarang</label>

        {{-- PERBAIKAN: Memastikan ID yang benar adalah "location" (bukan ids) --}}
        <select id="locations" class="form-select mb-4">
            <option selected disabled>Pilih cabang...</option>

            @foreach ($locations as $loc)
                <option value="{{ $loc['name'] }}">
                    {{ $loc['name'] }}
                </option>
            @endforeach
        </select>

        <div id="detail" class="mt-3" style="display:none;">
            <h5 id="locName"></h5>
            <p class="mb-1" id="locAddress"></p>
            <a id="locMaps" target="_blank" class="btn btn-primary mt-2">Lihat di Google Maps</a>
        </div>

    </div>
</div>


<script>
    // PERBAIKAN: Menghapus named argument "value:" agar @json tidak error di Blade/PHP
    // Sekarang variabel locations JavaScript berisi data lokasi dari controller
    const locations = @json($locations); 

    // Event listener dipasang pada elemen dengan id="location"
    document.getElementById('locations').addEventListener('change', function () {
        const selectedValue = this.value;

        // Validasi: Jika memilih opsi default (yang disabled/tidak punya value)
        if (!selectedValue) {
            document.getElementById('detail').style.display = 'none';
            return;
        }

        // Mencari data yang cocok berdasarkan nilai yang dipilih (name)
        const data = locations.find(x => x.name === selectedValue);

        if (data) {
            // Menampilkan detail
            document.getElementById('detail').style.display = 'block';
            
            // Mengisi konten
            document.getElementById('locName').innerText = data.name;
            document.getElementById('locAddress').innerText = data.address;
            
            // Mengisi link
            document.getElementById('locMaps').href = data.maps;
        }
    });
</script>

@endsection