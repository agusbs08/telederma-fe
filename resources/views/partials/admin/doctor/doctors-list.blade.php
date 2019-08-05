@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-magic-wand icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>List Dokter
        <div class="page-title-subheading">Daftar Dokter yang Telah Terdaftar dalam Sistem
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <button type="button" class="btn-shadow mr-3 btn btn-primary" onclick="openAddDoctorFormModal()">
        <i class="fa fa-plus"></i> Tambah Dokter
      </button>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama-</th>
          <th>Username</th>
          <th>Dinas Rumah Sakit</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($doctors as $i => $d)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $d['name'] }}</td>
          <td>{{ '@' . $d['username'] }}</td>
          <td>{{ $d['hospital'] }}</td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('admin.doctor-details', ['doctor_username' => $d['username']]) }}">
              <button class="mb-2 mr-2 btn-icon btn-pill btn btn-primary"><i
                  class="lnr-arrow-right-circle btn-icon-wrapper">
                </i>Detail
              </button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama-</th>
          <th>Username</th>
          <th>Rumah Sakit</th>
          <th>Tindakan</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection