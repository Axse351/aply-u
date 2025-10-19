<header>
    <div class="logo">
        <a href="{{ route('user.dashboard') }}" style="text-decoration: none; color: inherit;">
            Lockin
        </a>
    </div>

    <nav class="nav-links">
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            Beranda
        </a>
        <a href="{{ route('user.tentang') }}" class="{{ request()->routeIs('user.tentang') ? 'active' : '' }}">
            Tentang
        </a>
        <a href="{{ route('user.lowongan') }}" class="{{ request()->routeIs('user.lowongan') ? 'active' : '' }}">
            Lowongan
        </a>
        <a href="{{ route('user.mitra') }}" class="{{ request()->routeIs('user.mitra') ? 'active' : '' }}">
            Mitra
        </a>
    </nav>

    @if (Auth::check())
        {{-- Jika user sudah login --}}
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="cta" style="border:none;background:none;color:var(--sky);cursor:pointer;">
                Logout
            </button>
        </form>
    @else
        {{-- Jika belum login --}}
        <a href="{{ route('login') }}" class="cta">Login</a>
    @endif
</header>
