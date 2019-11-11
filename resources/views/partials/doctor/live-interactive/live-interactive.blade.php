@extends('base')
@section('content')

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Perhatian! Sebelum menerima panggilan, pastikan kamera berfungsi!</strong>
  <br>
  Silakan pilih USB3.0 Camera.
  Bila kamera belum muncul, silakan cek sambungan kabel USB kamera atau refresh halaman.
  <br>
  Bila gambar sudah muncul, mohon tunggu panggilan dari klinik. Kemudian Pilih "YA".
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
      <button id="endCall" class="btn btn-danger" style="display: none;" onclick="endCurrentCall()">
        <i class="pe-7s-close-circle btn-icon-wrapper"> </i>
        Akhiri Live Interactive</button>
    </div>
  </div>
</div>

@endsection