<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex p-0">
        <div class="image">
            <img src="{{ auth()->user()->image ? asset('photo/'.auth()->user()->image) : asset('photo/user.png') }}" class="img-circle elevation-2" alt="User Image" style="width:40px; height:40px;">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MENU</li>
            <li class="nav-item">
                <a href="{{ route('backend.dashboard') }}" class="nav-link {{ Request::is('c-panel/dashboard') || Request::is('c-panel/dashboard/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Beranda</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.member') }}" class="nav-link {{ Request::is('c-panel/member') || Request::is('c-panel/member/*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Member</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.paket') }}" class="nav-link {{ Request::is('c-panel/paket') || Request::is('c-panel/paket/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-box-open"></i>
                    <p>Paket</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.notifikasi') }}" class="nav-link {{ Request::is('c-panel/notifikasi') || Request::is('c-panel/notifikasi/*') ? 'active' : '' }}">
                    <i class="nav-icon far fa-bell"></i>
                    <p>Notifikasi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.pengaturan') }}" class="nav-link {{ Request::is('c-panel/pengaturan') || Request::is('c-panel/pengaturan/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Pengaturan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.profile') }}" class="nav-link {{ Request::is('c-panel/profile*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>Profile</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
