<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('components.header')

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('components.navbar')
        @include('components.ui-theme-setting')
        <div class="app-main">
            @include('components.sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/main.cba69814a806ecc7945a.js')}}"></script>
</body>

</html>

{{-- modals --}}
@if (Request::segment(1) == "puskesmas" && Request::segment(2) == "patients" && Request::segment(4) == "details")
@include('partials.puskesmas.modals.examination-detail')
@elseif (Request::segment(1) == "puskesmas" && Request::segment(2) == "patients")
@include('partials.puskesmas.modals.add-patient')
@endif