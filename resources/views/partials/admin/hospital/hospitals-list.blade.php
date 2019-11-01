@extends('base')
@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-culture icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>Rumah Sakit
        <div class="page-title-subheading">Total {{ count($hospitals) }} Rumah Sakit terdaftar.
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <button type="button" class="btn-shadow mr-3 btn btn-primary" data-toggle="modal"
        data-target="#addHospitalFormModal" onclick="openAddHospitalFormModal()">
        <i class="fa fa-plus"></i> Daftarkan Rumah Sakit
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
          <th>Telepon</th>
          <th>Alamat</th>
          <th>Website</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($hospitals as $i => $h)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $h['name'] }}</td>
          <td>{{ $h['phone'] }}</td>
          <td>{{ $h['address'] }}</td>
          <td><a href="{{ $h['website'] }}">{{ $h['website'] }}</a></td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('admin.hospital-details', ['hospital_id' => $h['_id']]) }}">
              <button class="btn-icon btn-pill btn btn-primary"><i class="lnr-arrow-right-circle btn-icon-wrapper">
                </i>
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
          <th>Telepon</th>
          <th>Alamat</th>
          <th>Website</th>
          <th>Detail</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection