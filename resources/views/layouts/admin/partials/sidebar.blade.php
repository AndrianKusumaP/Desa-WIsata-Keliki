<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Desa Keliki</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Potensi Desa Wisata -->
    <li class="nav-item {{ request()->routeIs('admin.potensi-wisata.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.potensi-wisata.index') }}">
            <i class="fas fa-fw fa-map-marked-alt"></i>
            <span>Potensi Desa Wisata</span>
        </a>
    </li>

    <!-- Nav Item - Potensi Desa Kuliner -->
    <li class="nav-item {{ request()->routeIs('admin.potensi-kuliner.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.potensi-kuliner.index') }}">
            <i class="fas fa-fw fa-utensils"></i>
            <span>Potensi Desa Kuliner</span>
        </a>
    </li>

    <!-- Nav Item - Paket Tour -->
    <li class="nav-item {{ request()->routeIs('admin.paket-tour.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.paket-tour.index') }}">
            <i class="fas fa-fw fa-bus-alt"></i>
            <span>Paket Tour</span>
        </a>
    </li>

    <!-- Nav Item - Galeri -->
    <li class="nav-item {{ request()->routeIs('admin.galeri.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.galeri.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Galeri</span>
        </a>
    </li>

    <!-- Nav Item - Artikel -->
    <li class="nav-item {{ request()->routeIs('admin.artikel.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.artikel.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Artikel</span>
        </a>
    </li>

    <div class="sidebar-heading">
        Support
    </div>

    <!-- Nav Item - Pesan -->
    <li class="nav-item {{ request()->routeIs('admin.pesan.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pesan.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
