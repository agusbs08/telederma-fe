@php
$class = "class=mm-active";
$page = Request::segment(2);
@endphp
<li class="app-sidebar__heading">Menu</li>
<li>
  <a href="" {{ $page === "dashboard" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-monitor">
    </i>Dashboard
  </a>
</li>
<li>
  <a href="{{ route('admin.doctors') }}" {{ $page === "doctors" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-magic-wand">
    </i>Dokter
  </a>
</li>
<li>
  <a href="{{ route('admin.puskesmas') }}" {{ $page === "puskesmas" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-home">
    </i>Puskesmas
  </a>
</li>
<li>
  <a href="{{ route('admin.hospitals') }}" {{ $page === "hospitals" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-culture">
    </i>Rumah Sakit
  </a>
</li>