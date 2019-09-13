@php
$class = "class=\"mm-active\"";
$page = Request::segment(2);
@endphp
<li class="app-sidebar__heading">Menu</li>
<li>
  <a href="" @php echo $page=="dashboard" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-monitor">
    </i>Dashboard
  </a>
  <a href="{{ route('admin.doctors') }}" @php echo $page=="doctors" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-magic-wand">
    </i>Dokter
  </a>
  <a href="{{ route('admin.puskesmas') }}" @php echo $page=="puskesmas" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-home">
    </i>Puskesmas
  </a>
  <a href="{{ route('admin.hospitals') }}" @php echo $page=="hospitals" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-culture">
    </i>Rumah Sakit
  </a>
</li>