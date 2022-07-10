<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-cart4"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kasir-App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $active === 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Product -->
    <li class="nav-item {{ $active === 'product' ? 'active' : '' }}">
        <a class="nav-link" href="/product">
            <i class="bi bi-archive-fill"></i>
            <span>Produk</span></a>
    </li>
     <!-- Nav Item - Transaction -->
     <li class="nav-item {{ $active === 'transaction' ? 'active' : '' }}">
        <a class="nav-link" href="/transaction">
            <i class="bi bi-bag-fill"></i>
            <span>Transaksi</span></a>
    </li>
     <!-- Nav Item - History Transaction -->
     <li class="nav-item {{ $active === 'history' ? 'active' : '' }}">
        <a class="nav-link" href="/history">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat Transaksi</span></a>
    </li>
</ul>
<!-- End of Sidebar -->