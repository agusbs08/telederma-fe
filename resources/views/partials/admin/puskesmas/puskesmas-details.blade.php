@extends('base')
@section('content')
<div class="col-md-12 col-lg-6 col-xl-12">
  <div class="card-shadow-primary profile-responsive card-border mb-3 card">
    <div class="dropdown-menu-header">
      <div class="dropdown-menu-header-inner bg-focus">
        <div class="menu-header-image opacity-3"
          style="background-image: url('{{  asset('images/dropdown-header/city4.jpg') }}"></div>
        <div class="menu-header-content btn-pane-right">
          <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
            <div class="avatar-icon rounded"><img src="{{ $puskesmas_detail['profilePicture'] }}" alt="Avatar 5"></div>
          </div>
          <div>
            <h5 class="menu-header-title">{{ $puskesmas_detail['name'] }}</h5>
            <h6 class="menu-header-subtitle">{{ $puskesmas_detail['email'] }}</h6>
          </div>
          <div class="menu-header-btn-pane">
            <button class="ladda-button btn btn-pill btn-dark" data-style="slide-right">
              <span class="ladda-label">Pengaturan Akun</span>
              <span class="ladda-spinner"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <ul class="list-group list-group-flush">
      <li class="bg-warm-flame list-group-item">
        <div class="widget-content">
          <div class="text-center">
            <h5 class="widget-heading opacity-4">Performa</h5>
            <h5>
              <span><b class="text-danger">12</b> pasien</span>
              <span> - </span>
              <span><b class="text-success">5</b> pemeriksaan</span>
            </h5>
          </div>
        </div>
      </li>
      <li class="p-0 list-group-item">
        <div class="grid-menu grid-menu-2col">
          <div class="no-gutters row">
            <div class="col-sm-6">
              <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link"><i
                  class="lnr-user btn-icon-wrapper btn-icon-lg mb-3"> </i>Lihat Pasien</button>
            </div>
            <div class="col-sm-6">
              <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link"><i
                  class="lnr-hourglass btn-icon-wrapper btn-icon-lg mb-3"> </i>Lihat Pemeriksaan</button>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
@endsection