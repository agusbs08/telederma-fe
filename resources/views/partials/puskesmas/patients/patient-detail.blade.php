@extends('base')
@section('content')
<div class="col-md-4 col-lg-6 col-xl-12">
  <div class="card-shadow-primary card-border mb-3 card">
    <div class="dropdown-menu-header">
      <div class="dropdown-menu-header-inner bg-primary">
        <div class="menu-header-image"
          style="background-image: url('{{ asset('images/dropdown-header/city2.jpg') }}');">
        </div>
        <div class="menu-header-content">
          <div class="avatar-icon-wrapper avatar-icon-lg">
            <div class="avatar-icon rounded btn-hover-shine"><img src="{{ $user_details['imageUrl'] }}" alt="Avatar 5">
            </div>
          </div>
          <div>
            <h5 class="menu-header-title">{{ $user_details['name'] }}</h5>
            <h6 class="menu-header-subtitle">NIK : {{ $user_details['nik'] }}</h6>
            <h6 class="menu-header-subtitle">Tanggal lahir : {{ $user_details['birthdate'] }}</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="scroll-area-sm">
      <div class="scrollbar-container">
        @if (sizeof($examinations_history) === 0)
        <div class="alert alert-success fade show m-5" role="alert">
          <strong>
            <p>Pasien belum melakukan pemeriksaan</p>
          </strong>
          <hr>
          <p class="mb-0">Tekan tombol "Tambah Pemeriksaan" di Bawah untuk Menambah Pemeriksaan.</p>
        </div>
        @endif
        <ul class="list-group list-group-flush">
          @foreach ($examinations_history as $item)
          <li class="list-group-item">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left center-elem mr-2"><i class="pe-7s-pin text-muted fsize-2"></i>
                </div>
                <div class="widget-content-left">
                  <div class="widget-heading">Pemeriksaan tanggal {{ date('d-m-Y', strtotime($item['createdAt'])) }},
                    pukul {{ date('H:i', strtotime($item['createdAt'])) }}
                  </div>
                </div>
                <div class="widget-content-right widget-content-actions">
                  <button class="mr-1 btn-icon btn-icon-only btn btn-primary btn-sm examinationDetailsModalBtn"
                    data-toggle="modal" data-target="#examinationDetailsModal" data-id="{{ $item['examinationId'] }}"
                    data-doctor-name="{{ $item['doctorId'] }}">
                    <i class="pe-7s-look btn-icon-wrapper"> </i>
                    Detail</button>
                  <button class="mr-1 btn-icon btn-icon-only btn btn-warning btn-sm examinationResultModalBtn"
                    data-toggle="modal" data-target="#examinationResultModal" data-id="{{ $item['examinationId'] }}">
                    <i class=" pe-7s-glasses btn-icon-wrapper"> </i>
                    Hasil
                  </button>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="text-center d-block card-footer">
      <a href="{{route('puskesmas.examination-form', ['patient_id' => $user_details['username']])}}"><button
          class="border-0 btn-transition btn btn-outline-primary"><i class="pe-7s-add-user btn-icon-wrapper"></i>
          Tambah
          Pemeriksaan</button></a>
      <a href="#"><button class="border-0 btn-transition btn btn-outline-success"><i
            class="pe-7s-headphones btn-icon-wrapper"></i>
          Live Interactive dengan Dokter</button></a>
    </div>
  </div>
</div>
@endsection