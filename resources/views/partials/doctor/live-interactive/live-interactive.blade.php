@extends('base')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="card-shadow-primary border mb-3 card card-body border-primary">
      <h5 class="card-title">Live Interactive</h5>
      <div class="video-container mb-3">
        <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
        <video id="remoteview" class="user-video" src="" autoplay="true" muted="muted"></video>
      </div>
      <button id="endCall" class="btn btn-danger" style="display: none;" onclick="endCurrentCall()">
        <i class="pe-7s-close-circle btn-icon-wrapper"> </i>
        Akhiri Live Interactive</button>
    </div>
  </div>
</div>

@endsection