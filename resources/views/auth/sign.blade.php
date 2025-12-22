<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sign</title>
    <link rel="stylesheet" href="{{ asset('css/auth2.css') }}">
</head>

<body>

<div class="sign-box">
    <h2>Sign</h2>

    <!-- FORM WAJIB -->
    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <!-- BUTTON WAJIB type="submit" -->
        <button type="submit" class="btn-sign">
            DAFTAR
        </button>
    </form>

    <div class="footer-text">
        Sudah punya akun? <a href="/login">Login</a>
    </div>
</div>

</body>
</html>
