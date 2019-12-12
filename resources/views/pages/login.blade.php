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
                {{-- <div class="slide-img-bg" style="background-image: url('{{ asset('images/originals/login2.png') }}');
                background: url('{{ asset('images/originals/login2.png') }}'">
              </div> --}}
              <div class="slide-img-bg" style="background: linear-gradient(
                rgba(0, 0, 0, 0.7), 
                rgba(0, 0, 0, 0.7)
              ), url('{{ asset('images/originals/endoskop.jpg') }}') no-repeat; background-size: 100% 100%;">
              </div>
              <div class="slider-content">
                <img src="{{ asset('images/logo-uni.png') }}" alt="" style="display: block;
                  margin-left: auto;
                  margin-right: auto;
                  width: 80%;
                  margin-bottom: 1.5rem;">
                <h5>Konsorsium Riset Unggulan Perguruan Tinggi
                </h5>
              </div>
            </div>
          </div>
          {{-- <div>
              <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                tabindex="-1">
                <div class="slide-img-bg"
                  style="background-image: url('{{ asset('images/originals/citydark.jpg') }}');">
        </div>
        <div class="slider-content">
          <h3>Mudah Digunakan</h3>
          <p>Aplikasi teledermatology sangat mudah digunakan karena didesain dengan layout yang sederhana namun
            tetap indah dipandang dan mudah digunakan untuk semua orang.</p>
        </div>
      </div>
    </div>
    <div>
      <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning"
        tabindex="-1">
        <div class="slide-img-bg" style="background-image: url('{{ asset('images/originals/citydark.jpg') }}');">
        </div>
        <div class="slider-content">
          <h3>Mudah Digunakan</h3>
          <p>Aplikasi teledermatology sangat mudah digunakan karena didesain dengan layout yang sederhana namun
            tetap indah dipandang dan mudah digunakan untuk semua orang.</p>
        </div>
      </div>
    </div> --}}
  </div>
</div>
</div>
<div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
  <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
    {{-- <div class="app-logo"></div> --}}
    {{-- <img src="{{ asset('images/logo-uni.png') }}" alt="" style="height: 50px; width: auto;"> --}}
    <h3 class="mb-0">
      <span>Silakan login ke akun Anda.</span></h3>
    <h6 class="mt-3">Hubungi admin bila ingin
      mendaftar sebagai puskesmas atau
      dokter.</h6>
    @if (session('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" aria-label="Close"></button>
      {{ session('errors') }}
    </div>
    @endif
    <div class="divider row"></div>
    <div>
      <div class="form-row">
        <div class="col-md-6">
          <div class="position-relative form-group"><label for="email" class="">Email</label>
            <input name="email" id="email" placeholder="Masukkan email Anda" type="text" class="form-control">
            <em id="username-error" class="error invalid-feedback" style="display: none;">Email tidak boleh
              kosong</em>
          </div>
        </div>
        <div class="col-md-6">
          <div class="position-relative form-group"><label for="password" class="">Password</label>
            <input name="password" id="password" placeholder="Masukkan password Anda" type="password"
              class="form-control">
            <em id="password-error" class="error invalid-feedback" style="display: none;">Password tidak boleh
              kosong</em>
          </div>
        </div>
      </div>
      {{-- <div class="g-recaptcha" data-callback="reCaptchaCallback" data-sitekey="{{ env('CAPTCHA_SITEKEY') }}">
    </div> --}}
    <div class="divider row"></div>
    <div class="alert alert-danger alert-dismissible fade show login-message" role="alert" style="display: none;">
    </div>
    <div class="d-flex align-items-center">
      <div class="ml-auto">
        <button class="ladda-button mb-2 mr-2 btn btn-primary" data-style="zoom-in" onclick="login()" disabled
          id="login-button">
          <span class="ladda-label">Masuk
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