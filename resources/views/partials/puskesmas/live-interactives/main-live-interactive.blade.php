@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-video icon-gradient bg-deep-blue">
        </i>
      </div>
      <div>Pengajuan Live Interactive
      </div>
    </div>
    <div class="page-title-actions">
      <div class="d-inline-block">
        <a href="{{ route('live-patient', ['id' => Session::get('name')]) }}" class="btn-shadow btn btn-primary">
          <span class="btn-icon-wrapper pr-2 opacity-7">
            <i class="fa fa-video fa-w-20"></i>
          </span>
          Ke Halaman Live Interactive
        </a>
      </div>
    </div>
  </div>
</div>

<div class="video-container">
  <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
  <video id="remoteview" class="user-video" src="" autoplay="true"></video>
</div>
<span id="myid"> </span>
<button id="endCall" style="display: none;" onclick="endCurrentCall()">End Call </button>
{{-- <canvas id="canvas-sc" width="640" height="480"></canvas> --}}
{{-- <button id="takeSc" onclick="snap()">snapshot</button> --}}
<div id="list">
  <ul id="users">
  </ul>
</div>

@endsection