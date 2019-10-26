<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('components.header')

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('components.navbar')
        {{-- @include('components.ui-theme-setting') --}}
        <div class="app-main">
            @include('components.sidebar')
            <div class="app-main__outer">
                @if (session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 10px 5px;">
                    <button type="button" class="close" aria-label="Close"></button>
                    <strong>{{ session('errors') }}</strong>
                </div>
                @endif
                <div class="app-main__inner @if ($pagename == 'conversation-list') p-0 @endif">
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/main.cba69814a806ecc7945a.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    {{-- custom scripts --}}
    @include('components.scripts')
</body>

</html>

{{-- modals --}}
@include('components.modals')