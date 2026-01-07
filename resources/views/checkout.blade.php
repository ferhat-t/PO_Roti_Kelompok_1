<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran - TI PASTRY</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #fdf8f3; 
            padding: 40px 20px; 
        }
        
        .checkout-container { 
            background: white; 
            max-width: 850px; /* Ukuran lebar setengah layar */
            margin: auto; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
        }

        h2 { 
            /* Warna cokelat sesuai navigasi TI PASTRY */
            color: #a68b6d; 
            border-bottom: 3px solid #f1e4d8; 
            padding-bottom: 15px; 
            margin-bottom: 30px;
            text-align: center;
        }

        .ringkasan-box {
            background: #fff9f3; 
            padding: 20px; 
            border-radius: 12px; 
            border-left: 5px solid #a68b6d; /* Garis samping cokelat */
            margin-bottom: 30px;
        }

        .form-group { margin-bottom: 20px; }
        
        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 600; 
            color: #444; 
        }

        input, select, textarea { 
            width: 100%; 
            padding: 14px; 
            border: 1px solid #ddd; 
            border-radius: 12px; 
            box-sizing: border-box; 
            font-size: 15px;
            outline-color: #a68b6d;
        }

        .flex-row {
            display: flex;
            gap: 20px;
        }

        .flex-row .form-group { flex: 1; }

        .btn-bayar { 
            /* Warna tombol kembali ke cokelat semula */
            background: #a68b6d; 
            color: white; 
            border: none; 
            padding: 18px; 
            width: 100%; 
            border-radius: 12px; 
            margin-top: 10px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 18px; 
            transition: 0.3s;
        }

        .btn-bayar:hover { 
            /* Warna saat kursor di atas tombol (cokelat lebih gelap) */
            background: #8e7356; 
            transform: translateY(-2px);
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #a68b6d; /* Teks link warna cokelat */
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="checkout-container">
    <h2>Konfirmasi Pengiriman</h2>

    <div class="ringkasan-box">
        <p style="margin: 0; font-weight: bold; color: #a68b6d;">Pesanan Anda:</p>
        <div id="display-pesanan" style="margin-top: 5px; color: #555;"></div>
    </div>

    <form id="formCheckout">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" id="nama" placeholder="Masukkan nama Anda" required>
        </div>

        <div class="flex-row">
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="number" id="wa" placeholder="Contoh: 0812345678" required>
            </div>
            <div class="form-group">
                <label>Metode Pembayaran</label>
                <select id="metode" required>
                    <option value="">-- Pilih Pembayaran --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="COD (Bayar di Tempat)">Bayar di Tempat (COD)</option>
                    <option value="GoPay / Dana">GoPay / Dana</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea id="alamat" rows="4" placeholder="Tulis alamat pengiriman secara detail" required></textarea>
        </div>

        <button type="submit" class="btn-bayar">KONFIRMASI & PESAN VIA WHATSAPP</button>
        <a href="/cart" class="btn-back">← Kembali ke Keranjang</a>
    </form>
</div>

<script>
    let cart = JSON.parse(localStorage.getItem('myCart')) || [];
    let display = document.getElementById('display-pesanan');
    
    if (cart.length > 0) {
        display.innerText = cart.join(", ");
    } else {
        display.innerText = "Belum ada produk dipilih.";
    }

    document.getElementById('formCheckout').onsubmit = function(e) {
        e.preventDefault();
        
        let nama = document.getElementById('nama').value;
        let wa = document.getElementById('wa').value;
        let alamat = document.getElementById('alamat').value;
        let metode = document.getElementById('metode').value;
        let pesanan = cart.join(", ");

        let teksWA = `Halo TI PASTRY!%0A` +
                     `Saya mau pesan roti:%0A%0A` +
                     `*Produk:* ${pesanan}%0A` +
                     `*Nama:* ${nama}%0A` +
                     `*Alamat:* ${alamat}%0A` +
                     `*Metode Bayar:* ${metode}`;

        // GANTI NOMOR DI BAWAH INI DENGAN NOMOR WA KAMU
        let nomorToko = "628123456789"; 

        alert('Menghubungkan ke WhatsApp Admin...');
        localStorage.removeItem('myCart'); 
        
        window.open(`https://wa.me/${nomorToko}?text=${teksWA}`, '_blank');
        window.location.href = "/";
    };
</script>

</body>
</html>