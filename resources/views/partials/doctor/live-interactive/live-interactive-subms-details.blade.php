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
        <a href="{{ route('doctor.get-live-interactive') }}">
          <button type="button" class="btn-shadow btn btn-primary">
            <span class="btn-icon-wrapper pr-2 opacity-7">
              <i class="fa fa-video fa-w-20"></i>
            </span>
            Ke Halaman Live Interactive
          </button>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="card mb-4">
  <div class="card-header">
    <div class="media flex-wrap w-100 align-items-center">
      <div class="media-body">
        <a href="javascript:void(0)">{{ $data['clinic']['name'] }}</a>
        <div class="text-muted small">
          Diajukan pada
          {{  date('d-M-Y', strtotime($data['createdAt'])) . ', pukul: ' . date('H:i', strtotime($data['createdAt']))}}.
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
  <div class="card-body">
    <form action="{{ route('doctor.respond-live-interactive-subms', ['id' => $data['_id']]) }}" method="POST">
      <div class="form-group">
        <textarea name="response" rows="3" class="form-control autosize-input" placeholder="Tulis tanggapan ..."
          required></textarea>
        <small class="form-text text-muted">Tanggapi dengan mengisikan tanggal dan waktu kesediaan.</small>
      </div>
      @csrf
      <button class="btn btn-primary mt-1">Kirim</button>
    </form>
  </div>
</div>

@if (sizeof($data['responses']) > 0)
<h6>Tanggapan:</h6>
@endif

@foreach ($data['responses'] as $d)
<div class="card mb-2">
  <div class="card-body">
    <div class="media">
      <img style="width: 40px; height: auto;" src="{{ $d['doctor']['profilePicture'] }}" alt=""
        class="d-block ui-w-40 rounded-circle">
      <div class="media-body ml-4">
        <div class="float-right text-muted small">
          {{  date('d M', strtotime($d['createdAt'])) }}</div>
        <a href="javascript:void(0)">{{ $d['doctor']['name'] }}</a>
        <div class="text-muted small">Anggota sejak {{ date('d-M-Y', strtotime($d['doctor']['registerDate'])) }}
          &nbsp;·&nbsp;
          {{ $d['doctor']['numberOfDiagnoses'] }}
          diagnosa.</div>
        <div class="mt-2">
          {{ $d['comment'] }}
        </div>
        @if ($d['doctor']['username'] == Session::get('username'))
        <div class="small mt-2">
          <a href="{{ route('doctor.delete-respond-live-interactive-subms', ['subs_id' => $data['_id'], 'resp_id' => $d['_id']]) }}"
            class="text-muted">Batalkan tanggapan</a>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection