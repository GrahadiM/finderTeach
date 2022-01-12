<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('frontend.index') }}">
        {{-- <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div> --}}
        {{-- <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }} </div> --}}
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ \Setting::getSetting()->title_web }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    {{-- Admin --}}
    @if (Auth::user()->role == 'admin')

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('admin-dashboard') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Website
        </div>

        <li class="nav-item {{ Request::is('admin-teacher*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin-teacher.index') }}">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Data Guru</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin-student*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin-student.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Murid</span>
            </a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Setting Website
        </div>

        <li class="nav-item {{ Request::is('admin-website*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin-website.index') }}">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Setting Website</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    @endif

    {{-- Teacher --}}
    @if (Auth::user()->role == 'teacher')
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('teacher-dashboard') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Guru
        </div>

        <li class="nav-item {{ Request::is('teacher-category*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('teacher-category.index') }}">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>Data Kategori</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('teacher-course*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('teacher-course.index') }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Data Kelas</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('teacher-jadwal*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('teacher-jadwal.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Murid</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('teacher-riwayat*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('teacher-riwayat.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Riwayat Pendidikan</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('teacher-perestasi*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('teacher-perestasi.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Prestasi Guru</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    @endif

    {{-- Student --}}
    @if (Auth::user()->role == 'student')

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('student-dashboard') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Data Murid
        </div>

        <li class="nav-item {{ Request::is('student-order*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('student-order.index') }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Data Pesanan</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    @endif
</ul>