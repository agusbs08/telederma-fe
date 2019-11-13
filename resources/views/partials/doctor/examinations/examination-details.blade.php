@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-eyedropper icon-gradient bg-plum-plate">
        </i>
      </div>
      <div>Detail Pemeriksaan
        <div class="page-title-subheading">Diajukan pada
          {{ date('d-m-Y', strtotime($examination_details['createdAt'])) }},
          pukul {{ date('H:i', strtotime($examination_details['createdAt'])) }} WIB oleh
          {{ $examination_details['clinic']['name'] }} ke {{ $examination_details['doctor']['hospital'] }}.
        </div>
        <div class="page-title-subheading">
          Tipe pemeriksaan: {{ $examination_details['type'] }}
        </div>
        <div class="page-title-subheading">
          Status:
          @if ($examination_details['checked'])
          <div class="badge badge-success"><i class="pe-7s-check btn-icon-wrapper"></i>
            Sudah Diperiksa
          </div>
          @else
          <div class="badge badge-danger"><i class="pe-7s-close btn-icon-wrapper"></i>
            Belum Diperiksa
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="mb-3 card">
      <div class="card-header card-header-tab-animation">
        <ul class="nav nav-justified">
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="nav-link show active">Deskripsi
              Pemeriksaan</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link show">Foto-foto Pemeriksaan</a>
          </li>
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-2" class="nav-link show">Hasil Diagnosa Sistem</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane show active" id="tab-eg115-0" role="tabpanel">
            <p>{{ $examination_details['results']['manual'] }}</p>
          </div>
          <div class="tab-pane show" id="tab-eg115-1" role="tabpanel">
            @foreach ($examination_details['images'] as $i)
            <img style="width:100%;max-width:300px;margin:5px;" src="{{ config('app.backend_url') . $i['url'] }}" alt=""
              id="skin-image">
            @endforeach
          </div>
          <div class="tab-pane show" id="tab-eg115-2" role="tabpanel">
            <ul class="nav flex-column">
              @foreach ($examination_details['results']['automatic'] as $adr)
              <li class="nav-item">
                <a href="javascript:void(0);" class="nav-link disabled">
                  <i class="nav-link-icon lnr-checkmark-circle"></i>
                  <span>{{ $adr['class'] }}</span>
                  <div class="ml-auto badge badge-pill badge-secondary">{{ $adr['probability'] }} %</div>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    @if (!array_key_exists('diagnoses', $examination_details))
    <div class="main-card mb-3 card">
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
            <input name="password" id="disease-name" placeholder="tuliskan nama penyakit kulit yang diderita"
              type="text" class="form-control">
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
    </div>
    @else
    <div class="main-card mb-3 card">
      <div class="card-header"><i class="header-icon lnr-screen icon-gradient bg-warm-flame"> </i>Hasil Diagnosa Dokter
      </div>
      <div class="card-body">
        <div class="mb-3 text-center">
          <div role="group" class="btn-group-sm nav btn-group">
            <a data-toggle="tab" href="#tab-eg15-0" class="btn-shadow active btn btn-primary">Hasil Diagnosa</a>
            <a data-toggle="tab" href="#tab-eg15-1" class="btn-shadow  btn btn-primary">Biaya Pemeriksaan</a>
            <a data-toggle="tab" href="#tab-eg15-2" class="btn-shadow  btn btn-primary">Resep</a>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-eg15-0" role="tabpanel">
            <p><strong>Nama Penyakit:</strong>
              <br>
              {{ $examination_details['diagnoses']['disease'] }}
            </p>
            <p><strong>Deskripsi:</strong>
              <br>
              {{ $examination_details['diagnoses']['description'] }}
            </p>
          </div>
          <div class="tab-pane" id="tab-eg15-1" role="tabpanel">
            <div class="card-shadow-info border mb-3 card card-body border-info">
              <p>Biaya pemeriksaan yang ditetapkan adalah sebesar:</p>
              <strong>
                <h3>Rp. {{ $examination_details['diagnoses']['cost'] }}</h3>
              </strong>
            </div>
          </div>
          <div class="tab-pane" id="tab-eg15-2" role="tabpanel">
            <table class="mb-0 table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Aturan Pakai</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($examination_details['diagnoses']['recipes'] as $i => $r)
                <tr>
                  <th scope="row">{{ $i+1 }}</th>
                  <td>{{ $r['medicine'] }}</td>
                  <td>{{ $r['usage'] }}</td>
                  <td>{{ $r['description'] }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <p>Diperiksa oleh
          {{ $examination_details['doctor']['name'] . ' dari ' . $examination_details['doctor']['hospital'] . ' pada ' . date('d-M-Y', strtotime($examination_details['createdAt'])) . ', pukul: ' . date('H:i', strtotime($examination_details['createdAt'])) . ' WIB'}}
        </p>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection