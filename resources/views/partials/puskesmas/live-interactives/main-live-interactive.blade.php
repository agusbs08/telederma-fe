@extends('base')
@section('content')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Perhatian!</strong> Silakan pilih USB3.0 Camera. Bila kamera belum muncul, silakan cek sambungan kabel USB
  kamera atau refresh halaman.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card-shadow-primary border mb-3 card card-body border-primary">
      <h5 class="card-title">Live Interactive</h5>
      <div class="video-container mb-3">
        <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
        <video id="remoteview" class="user-video" src="" autoplay="true" muted="muted"></video>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-header">
        Dokter yang sedang Online
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush" id="users">
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection