<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sign</title>
    <link rel="stylesheet" href="{{ asset('css/auth2.css') }}">
</head>

<body>

<div class="login-box">
    <h2>Login</h2>

    @if (session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif


    <form method="POST" action="{{ route('login.post') }}">
    @csrf

    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" class="btn-login-auth">LOGIN</button>
</form>


<!-- DIVIDER -->
<div class="auth-divider">
    <span>Belum punya akun?</span>
</div>

<!-- SIGN BUTTON -->
<a href="{{ route('sign') }}" class="btn-sign-auth">
    DAFTAR / SIGN
</a>




</div>

</body>
</html>
