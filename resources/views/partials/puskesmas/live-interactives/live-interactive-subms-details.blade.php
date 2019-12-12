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
        <a href="{{ route('live-patient', ['id' => Session::get('name')]) }}"
          class="btn-shadow btn btn-{{ $data['isLiveDone'] === true ? 'secondary' : 'primary' }}"
          {{ $data['isLiveDone'] === true ? 'disabled' : '' }}>
          <span class="btn-icon-wrapper pr-2 opacity-7">
            <i class="fa fa-video fa-w-20"></i>
          </span>
          Ke Halaman Live Interactive {{ $data['isLiveDone'] === true ? '(Sudah Berlangsung)' : '' }}
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card mb-4">
  <div class="card-header">
    <div class="media flex-wrap w-100 align-items-center">
      <div class="media-body">
        <a href="javascript:void(0)">{{ $data['hospital'] }}</a>
        <div class="text-muted small">
          Diajukan pada
          {{  date('d-M-Y', strtotime($data['createdAt'])) . ', pukul: ' . date('H:i', strtotime($data['createdAt']) +  25200)}}.
          Petugas: {{ $data['clinic']['officer'] }}
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <h6>Biodata Pasien:</h6>
    <strong>Nama: </strong>
    <p>
      {{ $data['patient']['name'] }}
    </p>
    <strong>NIK: </strong>
    <p>
      {{ $data['patient']['nik'] }}
    </p>
    <strong>Tanggal lahir: </strong>
    <p>
      @php
      $dob = $data['patient']['dob'];
      $today = new DateTime();
      $dob = new DateTime($dob, new DateTimeZone("Asia/Jakarta"));
      $diff = $dob->diff($today);
      $elapsed = $diff->format('%y tahun');
      echo $dob->format("d-m-Y") . " (" . $elapsed . ")";
      @endphp
    </p>
  </div>
  <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
    <div class="px-4 pt-3">
      <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle">
        <i class="ion ion-ios-chatboxes text-primary fsize-3"></i>&nbsp;
        <span class="align-middle">{{ sizeof($data['responses']) }} tanggapan</span>
      </a>
    </div>
  </div>
</div>

@foreach ($data['responses'] as $d)
<div class="card mb-2">
  <div class="card-body">
    <div class="media">
      <img style="width: 40px; height: auto;" src="{{ config('app.backend_url') . $d['doctor']['profilePicture'] }}"
        alt="" class="d-block ui-w-40 rounded-circle">
      <div class="media-body ml-4">
        <div class="float-right text-muted small">
          {{  date('d M', strtotime($d['createdAt'])) }}</div>
        <a href="javascript:void(0)">{{ $d['doctor']['name'] }}</a>
        <div class="text-muted small">Anggota sejak {{ date('d-M-Y', strtotime($d['doctor']['registerDate'])) }}
          &nbsp;·&nbsp;
          {{-- {{ $d['doctor']['numberOfDiagnoses'] }}
          diagnosa. --}}
        </div>
        <div class="mt-2">
          {{ $d['comment'] }}
        </div>
        {{-- <div class="small mt-2">
          <a href="javascript:void(0)" class="btn btn-primary btn-sm">Kontak Dokter</a>
        </div> --}}
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection