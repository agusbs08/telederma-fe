@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-lintern icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>Daftar Pemeriksaan
        <div class="page-title-subheading">Daftar pemeriksaan pasien yang diajukan ke Anda
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Dari-</th>
          <th>Dikirim</th>
          <th>Status</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($examinations as $i => $e)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $e['clinic']['name'] }}</td>
          <td>{{  date('d-M-Y', strtotime($e['createdAt'])) . ', pukul: ' . date('H:i', strtotime($e['createdAt']))}}
          </td>
          <td>
            <strong>
              @if ($e['checked'] == false)
              <div class="mb-2 mr-2 badge badge-danger">Belum ditanggapi</div>
              @else
              <div class="mb-2 mr-2 badge badge-success">Sudah ditanggapi</div>
              @endif
            </strong>
          </td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('doctor.examination-details', ['examination_id' => $e['_id']]) }}"><button
                class="mb-2 mr-2 btn-icon btn-pill btn btn-info"><i class="lnr-arrow-right-circle btn-icon-wrapper">
                </i>Detail</button></a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Dari-</th>
          <th>Dikirim</th>
          <th>Status</th>
          <th>Tindakan</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection