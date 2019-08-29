@php
$class = "class=\"mm-active\"";
$pagename = Request::segment(2);
@endphp
<li class="app-sidebar__heading">Menu</li>
{{-- <li>
    <a href="{{ route('puskesmas.dashboard') }}" @php echo $pagename=="dashboard" ? $class : null @endphp>
<i class="metismenu-icon pe-7s-monitor">
</i>Dashboard
</a>
</li> --}}
<li>
    <a href="{{ route('puskesmas.patients') }}" @php echo $pagename=="patients" ? $class : null @endphp>
        <i class="metismenu-icon pe-7s-users">
        </i>Pasien
    </a>
</li>
<li>
    <a href="{{ route('puskesmas.get-officers-list') }}" @php echo $pagename=="officers" ? $class : null @endphp>
        <i class="metismenu-icon pe-7s-user-female">
        </i>Petugas Klinik
    </a>
</li>