@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-culture icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>List Puskesmas
        <div class="page-title-subheading">Daftar Puskesmas yang Telah Terdaftar dalam Sistem
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <button type="button" class="btn-shadow mr-3 btn btn-primary" data-toggle="modal"
        data-target="#addPuskesmasFormModal">
        <i class="fa fa-plus"></i> Tambah Puskesmas
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
          <th>No. Reg</th>
          <th>Email</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($puskesmas as $i => $p)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $p['name'] }}</td>
          <td>{{ $p['identityNumber'] }}</td>
          <td>{{ $p['email'] }}</td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('admin.puskesmas-details', ['puskesmas_username' => $p['username']]) }}">
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
          <th>Email</th>
          <th>Tindakan</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection