<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-primary">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('donatur'))
                <li class="nav-header">DASHBOARD</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">MASTER</li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ set_active(['category.index','category.edit', 'category.create']) }}">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('campaign.index') }}" class="nav-link {{ set_active(['campaign.index','campaign.create']) }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Projek
                        </p>
                    </a>
                </li>

                <li class="nav-header">REFERENSI</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Donatur
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Daftar Donasi
                        </p>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasRole('admin'))
                <li class="nav-header">INFORMASI</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Kontak Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Subscriber
                        </p>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('donatur'))
                <li class="nav-header">REPOR</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasRole('donatur'))
                <li class="nav-header">LOG</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Log Aktivitas
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-header">PENGATURAN</li>
                @if (auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>