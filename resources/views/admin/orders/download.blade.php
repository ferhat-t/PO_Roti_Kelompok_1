<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan #{{ $order->id }} - needroTI</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; max-width: 800px; margin: 0 auto; }
        .header { text-align: center; border-bottom: 3px solid #c3b091; padding-bottom: 20px; margin-bottom: 30px; }
        .company-name { font-size: 28px; font-weight: bold; color: #c3b091; margin-bottom: 5px; }
        .company-tagline { color: #666; font-size: 14px; }
        .company-contact { margin-top: 10px; font-size: 14px; color: #333; }
        .order-title { text-align: center; font-size: 22px; font-weight: bold; margin: 30px 0; }
        .info-box { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .info-section { margin-bottom: 15px; }
        .info-section h3 { color: #c3b091; font-size: 16px; margin-bottom: 10px; border-bottom: 2px solid #c3b091; padding-bottom: 5px; }
        .info-row { display: flex; margin-bottom: 8px; }
        .info-label { font-weight: bold; width: 150px; }
        .info-value { flex: 1; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #c3b091; color: white; font-weight: bold; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .total-row { background-color: #fff5f2; font-weight: bold; font-size: 16px; }
        .total-row td { border-top: 3px solid #c3b091; }
        .footer { margin-top: 40px; text-align: center; font-size: 12px; color: #666; border-top: 2px solid #ddd; padding-top: 20px; }
        .payment-note { background: #fffbea; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
        .whatsapp-btn { display: inline-block; background: #25D366; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; margin-top: 15px; font-weight: bold; }
        .btn-print { display: inline-block; background: #007bff; color: white; padding: 12px 24px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        @media print { .no-print { display: none; } body { padding: 0; } }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="company-name">needroTI</div>
        <div class="company-tagline">All Amazing Bread & Cake</div>
        <div class="company-tagline">Rasakan Sajian Roti Papa Cookies yang Luar Biasa</div>
        <div class="company-contact">
            📞 Hotline: (0274) 4435707 | 📍 Semarang, Central Java
        </div>
    </div>

    <!-- Order Title -->
    <div class="order-title">DETAIL PESANAN #{{ $order->id }}</div>

    <!-- Customer & Order Info -->
    <div class="info-box">
        <div class="info-section">
            <h3>👤 Informasi Pelanggan</h3>
            <div class="info-row">
                <div class="info-label">Nama:</div>
                <div class="info-value">{{ $order->customer_name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nomor Telepon:</div>
                <div class="info-value">{{ $order->phone }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Alamat:</div>
                <div class="info-value">{{ $order->address ?? 'Tidak ada alamat' }}</div>
            </div>
        </div>

        <div class="info-section">
            <h3>📋 Informasi Pesanan</h3>
            <div class="info-row">
                <div class="info-label">Tanggal Pesanan:</div>
                <div class="info-value">{{ $order->created_at->format('d F Y, H:i') }} WIB</div>
            </div>
            <div class="info-row">
                <div class="info-label">Status Pesanan:</div>
                <div class="info-value" style="text-transform: uppercase; font-weight: bold; color: #c3b091;">
                    {{ $order->status }}
                </div>
            </div>
        </div>
    </div>

    <!-- Order Items Table -->
    <h3 style="color: #c3b091; margin-bottom: 10px;">🛒 Item Pesanan</h3>
    <table>
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Produk</th>
                <th class="text-right" style="width: 120px;">Harga Satuan</th>
                <th class="text-center" style="width: 80px;">Jumlah</th>
                <th class="text-right" style="width: 120px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $item->product->name }}</td>
                <td class="text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="text-center">{{ $item->quantity }}</td>
                <td class="text-right">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="4" class="text-right">TOTAL PEMBAYARAN:</td>
                <td class="text-right" style="font-size: 18px; color: #c3b091;">
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </td>
            </tr>
        </tfoot>
    </table>

    <!-- Payment Note -->
    <div class="payment-note">
        <strong>💳 Catatan Pembayaran:</strong><br>
        Silakan lakukan pembayaran dan konfirmasi melalui WhatsApp ke nomor pelanggan di atas atau hubungi hotline kami di (0274) 4435707.
    </div>

    <!-- Action Buttons (Hide on Print) -->
    <div class="no-print" style="text-align: center; margin: 30px 0;">
        <a href="https://wa.me/{{ $order->getWhatsappNumber() }}?text=Halo%20{{ urlencode($order->customer_name) }},%20pesanan%20Anda%20%23{{ $order->id }}%20dengan%20total%20Rp%20{{ number_format($order->total, 0, ',', '.') }}%20telah%20kami%20terima.%20Silakan%20lakukan%20pembayaran." 
           class="whatsapp-btn" target="_blank">
            💬 Hubungi via WhatsApp
        </a>
        <button onclick="window.print()" class="btn-print">
            🖨️ Print / Save as PDF
        </button>
    </div>


</body>
</html>