<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a>Arsip Akreditasi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('home') }}">AA</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Menu lainnya -->

            @if (auth()->user()->role == 'Universitas')
                <li class="menu-header">User Management</li>
                <li>
                    <a href="{{ url('/user') }}" class="nav-link">
                        <i class="fas fa-user"></i> <span>List User</span>
                    </a>
                    <a href="{{ route('user.create') }}" class="nav-link">
                        <i class="fas fa-user-plus"></i> <span>Tambah User</span>
                    </a>
                </li>

                <li class="menu-header">Master Data</li>
                <li>
                    <a href="{{ route('units.create') }}" class="nav-link">
                        <i class="fas fa-building"></i> <span>Tambah Unit</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sub-units.create') }}" class="nav-link">
                        <i class="fas fa-sitemap"></i> <span>Tambah Sub-Unit</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
