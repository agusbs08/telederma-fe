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
  <a href="{{ route('doctor.examinations') }}" @php echo $pagename=="examinations" ? $class : null @endphp>
    <i class="metismenu-icon pe-7s-eyedropper">
    </i>Pemeriksaan
  </a>
</li>