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
        <a href="{{ route('doctor.get-live-interactive', [
          'id' => $data['_id']
        ]) }}">
          <button type="button" class="btn-shadow btn btn-{{ $data['isLiveDone'] === true ? 'secondary' : 'primary' }}"
            {{ $data['isLiveDone'] === true ? 'disabled' : '' }}>
            <span class="btn-icon-wrapper pr-2 opacity-7">
              <i class="fa fa-video fa-w-20"></i>
            </span>
            Ke Halaman Live Interactive {{ $data['isLiveDone'] === true ? '(Sudah Berlangsung)' : '' }}
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
  @if ($data['isLiveDone'] === false)
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
  @endif
</div>

{{-- <div class="main-card mb-3 card">
  <div class="card-body">
    <h5 class="card-title">Hasil Diagnosa</h5>
    <div class="position-relative row form-group"><label for="" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <textarea rows="5" class="form-control autosize-input" id="description"
          placeholder="tuliskan hasil diagnosa"></textarea>
      </div>
    </div>
    <div class="position-relative row form-group"><label for="" class="col-sm-2 col-form-label">Biaya
        Pemeriksaan</label>
      <div class="col-sm-10">
        <div class="input-group">
          <div class="input-group-prepend"><span class="input-group-text">Rp </span></div>
          <input placeholder="tuliskan biaya pemeriksaan" type="text" class="form-control" id="diagnose-cost">
          <div class="input-group-append"><span class="input-group-text">.00</span></div>
        </div>
      </div>
    </div>
    <div class="position-relative row form-group"><label for="\" class="col-sm-2 col-form-label">Penyakit</label>
      <div class="col-sm-10">
        <input name="password" id="disease-name" placeholder="tuliskan nama penyakit kulit yang diderita" type="text"
          class="form-control">
      </div>
    </div>
    <div class="position-relative row form-group"><label for="\" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="toggle-resep" onchange="showRecipeField()">
          <label class="custom-control-label" for="toggle-resep">Sertakan Resep</label>
        </div>
      </div>
    </div>
    <fieldset id="recipe-field" style="display: none;">
      <div class="position-relative row form-group"><label for="" class="col-sm-2 col-form-label">Resep</label>
        <div class="col-sm-10">
          <div class="form-row">
            <div class="col-md-4 position-relative form-group"><input name="medicine-name" placeholder="nama obat"
                type="text" class="form-control"></div>
            <div class="col-md-2 position-relative form-group"><input name="usage-rule" placeholder="aturan pakai"
                type="text" class="form-control"></div>
            <div class="col-md-4 position-relative form-group"><input name="recipe-desc" placeholder="keterangan"
                type="text" class="form-control"></div>
            <div class="col-md-2 position-relative form-group"><button class="btn btn-primary btn-block"
                id="add-recipe-form" type="button">Tambah</button></div>
          </div>
        </div>
      </div>
    </fieldset>
  </div>
  <div class="d-block text-center card-footer">
    <button href="" class="btn-wide btn-shadow btn btn-block btn-primary" onclick="submitDiagnose()">Submit Hasil
      Diagnosa</button>
  </div>
</div> --}}

@if (sizeof($data['responses']) > 0)
<h6>Tanggapan:</h6>
@endif

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
          {{-- {{ $d['doctor']['numberOfDiagnoses'] }} --}}
          {{-- diagnosa. --}}
        </div>
        <div class="mt-2">
          {{ $d['comment'] }}
        </div>
        @if ($d['doctor']['id'] == Session::get('user-id'))
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