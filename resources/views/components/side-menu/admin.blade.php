@php
$class = "class=\"mm-active\"";
$pagename = Request::segment(2);
@endphp
<li class="app-sidebar__heading">Menu</li>
<li>
  {{-- <a href="" @php echo $pagename=="dashboard" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-monitor">
    </i>Dashboard
  </a> --}}
  <a href="{{ route('admin.doctors') }}" @php echo $pagename=="doctors" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-magic-wand">
    </i>Dokter
  </a>
  <a href="{{ route('admin.puskesmas') }}" @php echo $pagename=="puskesmas" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-home">
    </i>Puskesmas
  </a>
  <a href="#" @php echo $pagename=="hospital" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-culture">
    </i>Rumah Sakit
  </a>
</li>