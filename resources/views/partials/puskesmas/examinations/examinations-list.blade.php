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
        <div class="page-title-subheading">Daftar pemeriksaan pasien yang telah dilakukan di **Nama Puskesmas**
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
          <th>Tanggal</th>
          <th>Nama Pasien</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>12 Juni 1998</td>
          <td>Rojali</td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('puskesmas.examination-details', ['examination_id' => 1]) }}"><button
                class="mb-2 mr-2 btn-icon btn-pill btn btn-info"><i class="lnr-arrow-right-circle btn-icon-wrapper">
                </i>Detail</button></a>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Nama Pasien</th>
          <th>Detail</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection