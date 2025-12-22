<nav class="navbar">
    <div class="nav-left">
        <a href="/" class="logo">PO ROTI</a>
        <a href="/">Home</a>
        <a href="/produk">Produk</a>
        <a href="/tentang">Tentang</a>
    </div>

    <div class="nav-right">
        @auth
<div class="user-menu">

    <!-- USERNAME (BUKAN BUTTON) -->
    <div class="btn-user" id="userToggle">
        {{ Auth::user()->name }}
        <span class="arrow">▾</span>
    </div>

    <!-- DROPDOWN -->
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
<a href="{{ route('login') }}" class="btn-login">LOGIN</a>
<a href="{{ route('sign') }}">SIGN</a>
@endguest


    </div>
</nav>

