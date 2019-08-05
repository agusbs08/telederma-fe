@extends('no-header-sidebar-base')
@section('login-page')
<div class="app-container">
  <div class="h-100">
    <div class="h-100 no-gutters row">
      <div class="d-none d-lg-block col-lg-4">
        <div class="slider-light">
          <div class="slick-slider">
            <div>
              <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate"
                tabindex="-1">
                <div class="slide-img-bg" style="background-image: url('{{ asset('images/originals/city.jpg') }}');">
                </div>
                <div class="slider-content">
                  <h3>Keuntungan 1</h3>
                  <p>Keterangan keuntungan 1</p>
                </div>
              </div>
            </div>
            <div>
              <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                tabindex="-1">
                <div class="slide-img-bg"
                  style="background-image: url('{{ asset('images/originals/citynights.jpg') }}');">
                </div>
                <div class="slider-content">
                  <h3>Keuntungan 2</h3>
                  <p>Keterangan keuntungan 2</p>
                </div>
              </div>
            </div>
            <div>
              <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning"
                tabindex="-1">
                <div class="slide-img-bg"
                  style="background-image: url('{{ asset('images/originals/citydark.jpg') }}');"></div>
                <div class="slider-content">
                  <h3>Keuntungan 3</h3>
                  <p>Keterangan keuntungan 3</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
          <div class="app-logo"></div>
          <h4 class="mb-0">
            <span class="d-block">Selamat datang,</span>
            <span>Silakan login ke akun Anda.</span></h4>
          <h6 class="mt-3">Hubungi admin bila ingin membuat mendaftar sebagai puskesmas atau dokter.</h6>
          <div class="divider row"></div>
          <div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="position-relative form-group"><label for="username" class="">Username</label><input
                    name="username" id="username" placeholder="Masukkan username Anda" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="position-relative form-group"><label for="password" class="">Password</label><input
                    name="password" id="password" placeholder="Masukkan password Anda" type="password" class="form-control">
                </div>
              </div>
            </div>
            <div class="divider row"></div>
            <div class="d-flex align-items-center">
              <div class="ml-auto">
                {{-- <a href="javascript:void(0);" class="btn-lg btn btn-link">Lupa Password</a> --}}
                <button class="ladda-button mb-2 mr-2 btn btn-focus" data-style="zoom-in" onclick="login()">
                  <span class="ladda-label">Masuk ke Dashboard
                  </span>
                  <span class="ladda-spinner">
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection