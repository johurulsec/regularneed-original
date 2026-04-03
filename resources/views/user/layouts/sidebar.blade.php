<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user') }}">
        @php
            $setting = DB::table('settings')->first();
        @endphp
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset($setting->logo) }}" style="height:50px; width:100px;" alt="logo">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Shop
    </div>
    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.order.index') }}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.productreview.index') }}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>

    {{-- <!-- Coin Balance -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.coin.balance') }}">
            <i class="fas fa-coins"></i>
            <span>Coin Balance</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Posts
    </div>
    <!-- Comments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.post-comment.index') }}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>