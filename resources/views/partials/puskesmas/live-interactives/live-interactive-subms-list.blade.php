@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-video icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>Pengajuan Live Interactive
        <div class="page-title-subheading">Daftar pengajuan live interactive di {{ Session::get('name') }}
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <div class="position-relative form-group">
        <select type="select" id="live-status-filter" name="" class="custom-select" onchange="reloadWithFilter()">
          <option value="available" {{ $filter === 'available' ? 'selected' : '' }}>Pengajuan Belum Dilakukan</option>
          <option value="done" {{ $filter === 'done' ? 'selected' : '' }}>Pengajuan Sudah Dilakukan</option>
        </select>
      </div>
      {{-- <a href="{{ route('puskesmas.patients') }}" class=" btn-shadow mr-3 btn btn-primary">
      <i class="fa fa-plus"></i> Ajukan Live Interactive
      </a> --}}
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pasien</th>
          <th>Petugas</th>
          <th>RS Tujuan</th>
          <th>Tanggapan</th>
          <th>Waktu</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
        @if (sizeof($data) > 0)
        @php $i = 0; @endphp
        @foreach ($data as $d)
        @php $i++; @endphp
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $d['patient']['name'] }}</td>
          <td>{{ $d['clinic']['officer'] }}</td>
          <td>{{ $d['hospital'] }}</td>
          <td>{{ sizeof($d['responses']) }} tanggapan</td>
          <td>{{ date("d M, Y, H:m", strtotime(date($d['createdAt']))) }} WIB</td>
          <td style="text-align: center; vertical-align: middle;">
            <a href="{{ route('puskesmas.get-live-interactive-subms-details', ['id' => $d['_id']]) }}"><button
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
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Petugas</th>
        <th>RS Tujuan</th>
        <th>Tanggapan</th>
        <th>Waktu</th>
        <th>Detail</th>
      </tfoot>
    </table>
  </div>
</div>
@endsection