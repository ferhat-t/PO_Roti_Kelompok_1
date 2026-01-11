<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order - Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container" style="padding: 40px;">
    <h2>My Order (Keranjang)</h2>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if($carts->isEmpty())
        <p>Keranjang kosong. Tambahkan produk dari halaman utama.</p>
        <p><a href="{{ route('welcome') }}">Kembali ke produk</a></p>
    @else
        <table class="cart-table" style="width:100%; border-collapse: collapse;">
            <thead>
            <tr>
                <th style="text-align:left; padding:8px;">Produk</th>
                <th style="text-align:right; padding:8px;">Harga</th>
                <th style="text-align:center; padding:8px;">Jumlah</th>
                <th style="text-align:right; padding:8px;">Subtotal</th>
                <th style="padding:8px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @foreach($carts as $cart)
                @php
                    $subtotal = $cart->product ? ($cart->product->price * $cart->quantity) : 0;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td style="padding:8px; display:flex; gap:12px; align-items:center;">
                        @if($cart->product && $cart->product->image)
                            <img src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}" style="width:64px; height:64px; object-fit:cover; border-radius:8px;">
                        @endif
                        <div>
                            <strong>{{ $cart->product->name ?? 'Produk tidak ditemukan' }}</strong>
                            @if($cart->note)
                                <div><small>Catatan: {{ $cart->note }}</small></div>
                            @endif
                        </div>
                    </td>
                    <td style="padding:8px; text-align:right;">Rp. {{ number_format($cart->product->price ?? 0, 0, ',', '.') }}</td>
                    <td style="padding:8px; text-align:center;">
                        <form method="POST" action="{{ route('cart.update', $cart) }}" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" min="1" value="{{ $cart->quantity }}" style="width:64px; text-align:center;">
                            <button type="submit" class="btn-update">Update</button>
                        </form>
                    </td>
                    <td style="padding:8px; text-align:right;">Rp. {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td style="padding:8px; text-align:center;">
                        <form method="POST" action="{{ route('cart.destroy', $cart) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" style="padding:8px; text-align:right;"><strong>Total</strong></td>
                <td style="padding:8px; text-align:right;"><strong>Rp. {{ number_format($total, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
            </tfoot>
        </table>

        <div style="margin-top:20px; text-align:right;">
            <button class="btn-checkout">Checkout</button>
        </div>
    @endif
</div>

</body>
</html>