@php
$class = "class=\"mm-active\"";
$pagename = Request::segment(2);
@endphp
<li class="app-sidebar__heading">Menu</li>
<li>
    <a href="{{ route('puskesmas.dashboard') }}" @php echo $pagename=="dashboard" ? $class : null @endphp>
        <i class="metismenu-icon pe-7s-graph2">
        </i>Dashboard
    </a>
</li>
<li>
    <a href="{{ route('puskesmas.patients') }}" @php echo $pagename=="patients" ? $class : null @endphp>
        <i class="metismenu-icon pe-7s-graph">
        </i>Pasien
    </a>
</li>
<li>
    <a href="{{ route('puskesmas.examinations') }}" @php echo $pagename=="examinations" ? $class : null @endphp>
        <i class="metismenu-icon pe-7s-graph1">
        </i>Pemeriksaan
    </a>
</li>