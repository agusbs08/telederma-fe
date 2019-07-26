@extends('welcome') @section('content')
<div class="card-body">
    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
        @yield('data-content')
    </table>
</div>
@endsection