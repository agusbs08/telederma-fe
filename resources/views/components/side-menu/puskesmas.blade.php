@php
$class = "class=mm-active";
$page = Request::segment(2);
@endphp
<li class="app-sidebar__heading">Menu</li>
<li>
    <a href="#" {{ $page === "dashboard" ? $class : "" }}>
        <i class="metismenu-icon pe-7s-monitor">
        </i>Dashboard
    </a>
</li>
<li>
    <a href="{{ route('puskesmas.patients') }}" {{ $page === "patients" ? $class : "" }}>
        <i class="metismenu-icon pe-7s-users">
        </i>Pasien
    </a>
</li>
<li>
    <a href="{{ route('puskesmas.get-officers-list') }}" {{ $page === "officers" ? $class : "" }}>
        <i class="metismenu-icon pe-7s-user-female">
        </i>Petugas Klinik
    </a>
</li>
<li class="app-sidebar__heading">Pengaturan</li>
<li>
    <a href="{{ route('account-settings') }}" {{ Request::segment(3) === "general" ? $class : "" }}>
        <i class="metismenu-icon pe-7s-config">
        </i>Umum
    </a>
</li>
<li>
    <a href="{{ route('credential-settings') }}" {{ Request::segment(3) === "credentials" ? $class : "" }}>
        <i class="metismenu-icon pe-7s-shield">
        </i>Keamanan & Login
    </a>
</li>