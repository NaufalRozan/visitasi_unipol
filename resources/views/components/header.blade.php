<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">

    <!-- Kiri: Navigasi dan menu -->
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/berkas') }}" class="nav-link">Arsip</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/master') }}" class="nav-link">Setelan</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/resume') }}" class="nav-link">Dashboard</a>
        </li>
        @if (auth()->user()->role === 'Universitas')
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link">User</a>
            </li>
        @endif
    </ul>

    <!-- Kanan: Search dan User -->
    <ul class="navbar-nav navbar-right ml-auto d-flex align-items-center">
        <!-- Search -->
        <li class="nav-item d-flex align-items-center" id="search-container">
            <a href="#" class="nav-link nav-link-lg" id="search-toggle"><i class="fas fa-search"></i></a>
            <form id="search-form" class="form-inline {{ request('q') ? '' : 'd-none' }}"
                action="{{ route('detail_item.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari berkas..."
                        value="{{ request('q') }}">
                    <button type="submit" class="btn"
                        style="background-color: #00c853; color: white; border: 1px solid #00c853;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </li>

        <!-- User -->
        <li class="dropdown ml-3">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">
                    @php
                        $sub_unit_id = session('sub_unit_id');
                        $sub_units = \App\Models\Prodi::find($sub_unit_id);
                    @endphp
                    {{ auth()->user()->name }} |
                    {{ $sub_units ? $sub_units->nama_sub_unit : 'Sub Unit Tidak Ditemukan' }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
