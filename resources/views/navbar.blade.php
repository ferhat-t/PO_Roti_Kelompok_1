<nav class="navbar">
    <div class="nav-left">
        <a href="/" class="logo">PO ROTI</a>
        <a href="/">Home</a>
        <a href="/produk">Produk</a>
        <a href="/tentang">Tentang</a>
    </div>

    @auth
<div class="user-menu">

    <!-- 1. USERNAME (TIDAK KIRIM APA-APA) -->
    <button type="button" class="btn-user" id="userToggle">
        {{ Auth::user()->name }}
        <span class="arrow">▾</span>
    </button>

    <!-- 2. DROPDOWN -->
    <div class="user-dropdown" id="userDropdown">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-logout">
                Logout
            </button>
        </form>
    </div>

</div>
@endauth

@guest
<a href="{{ route('login') }}" class="btn-login">Login</a>
<a href="{{ route('sign') }}" class="btn-sign">Sign</a>
@endguest



