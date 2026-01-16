<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja - TI PASTRY</title>
    <style>
        body { font-family: sans-serif; background: #fdf8f3; padding: 50px; }
        .cart-container { background: white; max-width: 600px; margin: auto; padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h2 { color: #a68b6d; border-bottom: 2px solid #a68b6d; padding-bottom: 10px; }
        .item { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
        .btn-checkout { background: #a68b6d; color: white; border: none; padding: 15px; width: 100%; border-radius: 8px; margin-top: 20px; cursor: pointer; font-weight: bold; }
        .btn-back { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; }
    </style>
</head>
<body>

<div class="cart-container">
    <h2>Keranjang Belanja Saya</h2>
    <div id="list-belanja">
        </div>
    <div id="total-harga" style="margin-top: 20px; font-weight: bold; font-size: 1.2em;"></div>
    
    <button class="btn-checkout" onclick="window.location.href='/checkout'">CHECKOUT SEKARANG</button>
    <a href="/" class="btn-back">← Kembali Pilih Roti</a>
</div>

<script>
    // Ambil data dari memory browser
    let cart = JSON.parse(localStorage.getItem('myCart')) || [];
    let listDiv = document.getElementById('list-belanja');
    
    if (cart.length === 0) {
        listDiv.innerHTML = "<p>Wah, keranjangmu masih kosong nih.</p>";
    } else {
        cart.forEach((item, index) => {
            listDiv.innerHTML += `
                <div class="item">
                    <span>${item}</span>
                    <button onclick="hapusItem(${index})" style="color:red; border:none; background:none; cursor:pointer;">Hapus</button>
                </div>`;
        });
    }

    function hapusItem(index) {
        cart.splice(index, 1);
        localStorage.setItem('myCart', JSON.stringify(cart));
        location.reload(); // Refresh halaman untuk update list
    }
</script>

</body>
</html>