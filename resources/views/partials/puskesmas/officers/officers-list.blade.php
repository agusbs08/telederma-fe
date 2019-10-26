@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>Daftar Petugas Puskesmas
        <div class="page-title-subheading">Daftar petugas di {{ Session::get('name') }}
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <button type="button" class="btn-shadow mr-3 btn btn-dark" data-toggle="modal" data-target="#addOfficerFormModal">
        <i class="fa fa-plus"></i> Daftarkan Petugas Baru
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
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Gender</th>
          <th>No. Identitas</th>
          {{-- <th>Detail Petugas</th> --}}
        </tr>
      </thead>
      <tbody>
        @if (sizeof($data) > 0)
        @foreach ($data as $i => $d)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $d['name'] }}</td>
          <td>{{ date("d M, Y", strtotime(date($d['dob']))) }}</td>
          <td>{{ $d['gender'] }}</td>
          <td>{{ $d['identityNumber'] }}</td>
          {{-- <td style="text-align: center; vertical-align: middle;">
            <a href=""><button class="mb-2 mr-2 btn-icon btn-pill btn btn-info">
                <i class="lnr-arrow-right-circle btn-icon-wrapper">
                </i>Detail</button></a>
          </td> --}}
        </tr>
        @endforeach
        @endif
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Gender</th>
          <th>Tanggal Lahir</th>
          <th>No. Identitas</th>
          {{-- <th>Detail Petugas</th> --}}
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection