@extends('base')
@section('content')
<div class="col-md-12 col-lg-6 col-xl-12">
  <div class="card-shadow-primary profile-responsive card-border mb-3 card">
    <div class="dropdown-menu-header">
      <div class="dropdown-menu-header-inner bg-focus">
        <div class="menu-header-image opacity-3" style="background-image: url('{{ $hospital_detail['image'] }}"></div>
        <div class="menu-header-content btn-pane-right">
          <div>
            <h5 class="menu-header-title">{{ $hospital_detail['name'] }}</h5>
          </div>
          <div class="menu-header-btn-pane">
          </div>
        </div>
      </div>
    </div>
    <div class="card-header card-header-tab-animation">
      <ul class="nav">
        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="nav-link show active">Informasi Umum</a>
        </li>
        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link show">Dokter</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane show active" id="tab-eg115-0" role="tabpanel">
          <p>
            <strong>Tentang Rumah Sakit:</strong>
            <br>
            {{ $hospital_detail['about'] }}
          </p>
          <p>
            <strong>Alamat:</strong>
            <br>
            {{ $hospital_detail['address'] }}
          </p>
          <p>
            <strong>Telepon:</strong>
            <br>
            {{ $hospital_detail['phone'] }}
          </p>
          <p>
            <strong>website:</strong>
            <br>
            <a href="{{ $hospital_detail['website'] }}">{{ $hospital_detail['website'] }}</a>
          </p>
        </div>
        <div class="tab-pane show" id="tab-eg115-1" role="tabpanel">
          @if (count($doctors) > 0)
          <div class="row">
            @foreach($doctors as $doctor) <div class="col-md-12 col-lg-6 col-xl-6">
              <div class="card-shadow-primary card-border text-white mb-3 card bg-primary">
                <div class="dropdown-menu-header">
                  <div class="dropdown-menu-header-inner bg-primary">
                    <div class="menu-header-content">
                      <div class="avatar-icon-wrapper mb-3 avatar-icon-xl">
                        <div class="avatar-icon"><img src="{{ $doctor['profilePicture'] }}" alt="Avatar 5"></div>
                      </div>
                      <div>
                        <h5 class="menu-header-title">{{ $doctor['name'] }}</h5>
                        <h6 class="menu-header-subtitle">NIP: {{ $doctor['identityNumber'] }}</h6>
                        <a href="mailto:{{$doctor['email']}}" style="color: white;">
                          <h6 class="menu-header-subtitle">{{ $doctor['email'] }}</h6>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center d-block card-footer">
                  <button class="btn-shadow-dark btn-wider btn btn-success">
                    <i class="pe-7s-call btn-icon-wrapper"> </i>
                    {{ $doctor['phone'] }}
                  </button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @else
          <p>Tidak ada dokter yang terdaftar. <a href="{{ route('admin.doctors') }}">Klik </a>disini untuk menambahkan
            dokter.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection