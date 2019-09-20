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
  <a href="{{ route('doctor.examinations') }}" {{ $page === "examinations" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-eyedropper">
    </i>Pemeriksaan
  </a>
</li>
<li>
  <a href="{{ route('doctor.get-live-interactive') }}" {{ $page === "live" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-video">
    </i>Live Interactive
  </a>
</li>
<li>
  <a href="{{ route('doctor.get-live-interactive-subms-list') }}" {{ $page === "live-interactive" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-note2">
    </i>Pengajuan Live
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
<li class="app-sidebar__heading">Lainnya</li>
<li>
  <a href="#" {{ $page === "dashboard" ? $class : "" }}>
    <i class="metismenu-icon pe-7s-help1">
    </i>Bantuan
  </a>
</li>