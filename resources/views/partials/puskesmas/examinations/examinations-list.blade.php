@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-eyedropper icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>Daftar Pemeriksaan
        <div class="page-title-subheading">Daftar pemeriksaan di {{ Session::get('name') }}
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <a href="{{ route('puskesmas.patients') }}" class=" btn-shadow mr-3 btn btn-primary">
        <i class="fa fa-plus"></i> Tambahkan Pemeriksaan
      </a>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Pasien</th>
          <th>Rumah Sakit</th>
          <th>Tipe</th>
          <th>Status</th>
          <th>Diajukan pada-</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
        @if (sizeof($data) > 0)
        @foreach ($data as $i => $d)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $d['patient']['name'] }}</td>
          <td>{{ $d['doctor']['hospital'] }}</td>
          <td>{{ $d['type'] }}</td>
          <td>{{ $d['checked'] ? "Sudah" : "Belum" }} ditanggapi</td>
          <td>{{ date("d M, Y", strtotime(date($d['createdAt'])) +  25200) }}</td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('puskesmas.get-examination-details', ['examination_id' => $d['_id']]) }}"><button
                class="mb-2 mr-2 btn-icon btn-pill btn btn-info">
                <i class="lnr-arrow-right-circle btn-icon-wrapper">
                </i>Detail</button></a>
          </td>
        </tr>
        @endforeach
        @endif
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Pasien</th>
          <th>Rumah Sakit</th>
          <th>Tipe</th>
          <th>Status</th>
          <th>Diajukan pada-</th>
          <th>Detail</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection