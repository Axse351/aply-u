<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Lockin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">LK</a>
        </div>

        <ul class="sidebar-menu">

            {{-- === HOME === --}}
            <li class="menu-header">Home</li>
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- === MANAJEMEN DATA === --}}
            <li class="menu-header">Manajemen Data</li>

            <li class="{{ request()->routeIs('jobs.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jobs.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Lowongan Kerja</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-tags"></i>
                    <span>Kategori Pekerjaan</span>
                </a>
            </li>

            <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users') }}">
                    <i class="fas fa-users"></i>
                    <span>Daftar User</span>
                </a>
            </li>

            {{-- === STATISTIK === --}}
            <li class="menu-header">Lamaran Masuk</li>
            <li class="{{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.applications.index') }}">
                    <i class="fas fa-users"></i> <span>Daftar Pelamar</span>
                </a>
            </li>


            {{-- === AKUN === --}}
            <li class="menu-header">Akun</li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger" style="text-align:left;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>
</div>
