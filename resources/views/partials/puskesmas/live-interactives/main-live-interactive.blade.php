@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-video icon-gradient bg-deep-blue">
        </i>
      </div>
      <div>Live Interactive
      </div>
    </div>
    <div class="page-title-actions">
      <div class="d-inline-block">
      </div>
    </div>
  </div>
</div>

<div class="video-container">
  <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
  <video id="remoteview" class="user-video" src="" autoplay="true" muted="muted"></video>
</div>
<span id="myid"></span>
<button id="endCall" class="btn btn-danger" style="display: none;" onclick="endCurrentCall()">Akhiri Panggilan</button>
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-header">
        Daftar Dokter yang sedang Online
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush" id="users">
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection