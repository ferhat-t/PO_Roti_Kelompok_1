<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lokasi TI PASTRY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #ffffff);
        }
        .hero {
            background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),
                        url('{{ asset("images/unimus.jpg") }}') center/cover no-repeat;
            height: 60vh;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
        }
        .info-card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
        }
        iframe {
            border-radius: 15px;
        }
    </style>
</head>
<body>

{{-- HERO --}}
<section class="hero">
    <div class="container">
        <h1 class="display-4 fw-bold">TI PASTRY</h1>
        <p class="lead">Enak, Lezat, dan Ramah Dikantong</p>
    </div>
</section>

{{-- CONTENT --}}
<div class="container my-5">
    <div class="row g-4">

        {{-- INFO --}}
        <div class="col-md-5">
            <div class="card info-card p-4">
                <h3 class="fw-bold mb-3">Lokasi TI PASTRY</h3>
                <p>
                    TI PASTRY adalah sebuah website toko roti yang dibuat oleh
                    mahasiswa Teknologi Informasi Universitas Muhammadiyah Semarang (UNIMUS) berlokasi di Kota Semarang,
                    Jawa Tengah, dengan lingkungan kampus yang strategis, nyaman,
                    dan mudah diakses.
                </p>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">🏫 Nama Toko: TI PASTRY</li>
                    <li class="list-group-item">📍 Alamat: Jl. Kedungmundu Raya No.18</li>
                    <li class="list-group-item">🌆 Kota: Semarang</li>
                    <li class="list-group-item">📞 Telp: 088226655764</li>
                </ul>

                <a href="https://unimus.ac.id" target="_blank" class="btn btn-primary mt-3">
                    Kunjungi Website
                </a>
            </div>
        </div>

        {{-- MAP --}}
        <div class="col-md-7">
            <iframe
                src="https://www.google.com/maps?q=Universitas+Muhammadiyah+Semarang&output=embed"
                width="100%"
                height="400"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</div>

{{-- FOOTER --}}
<footer class="bg-primary text-white text-center py-3">
    © {{ date('Y') }} Universitas Muhammadiyah Semarang
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
