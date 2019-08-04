@extends('base')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="mb-3 card">
      <div class="card-header card-header-tab-animation">
        <ul class="nav nav-justified">
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="nav-link show active">Deskripsi
              Pemeriksaan</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link show">Foto-foto Pemeriksaan</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane show active" id="tab-eg115-0" role="tabpanel">
            <p>{{ $examination_details['description'] }}</p>
          </div>
          <div class="tab-pane show" id="tab-eg115-1" role="tabpanel">
            @foreach ($examination_details['images'] as $i)
            <img src="{{ $i['image'] }}" alt="">
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="main-card mb-3 card">
      <div class="card-header"><i class="header-icon lnr-screen icon-gradient bg-warm-flame"> </i>Hasil Diagnosa
        Otomatis Sistem
      </div>
      <div class="card-body">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Melanocytic Nevi (nv)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Melanoma (mel)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Benign keratosis-like lesions (bkl)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Basal cell carcinoma (bcc)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Actinic keratoses (akiec)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Vascular lesions (vasc)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link disabled">
              <i class="nav-link-icon lnr-checkmark-circle"></i>
              <span>Dermatofibroma (df)</span>
              <div class="ml-auto badge badge-pill badge-secondary">- %</div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    @if (sizeof($diagnoses) == 0)
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Hasil Diagnosa</h5>
        <div class="position-relative row form-group"><label for="" class="col-sm-2 col-form-label">Deskripsi</label>
          <div class="col-sm-10">
            <textarea rows="3" class="form-control autosize-input" style="height: 35px;" id="description"
              placeholder="tuliskan hasil diagnosa"></textarea>
          </div>
        </div>
        <div class="position-relative row form-group"><label for="" class="col-sm-2 col-form-label">Biaya
            Pemeriksaan</label>
          <div class="col-sm-10">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">Rp </span></div>
              <input placeholder="tuliskan biaya pemeriksaan" step="1" type="number" class="form-control"
                id="diagnose-cost">
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
        <fieldset id="recipe-field">
          <div class="position-relative row form-group"><label for="" class="col-sm-2 col-form-label">Resep</label>
            <div class="col-sm-10">
              <div class="form-inline">
                <div class="position-relative form-group">
                  <input name="medicine-name" placeholder="nama obat" type="text" class="mr-2 form-control">
                </div>
                <div class="position-relative form-group ">
                  <input name="usage-rule" placeholder="aturan pakai" type="text" class="mr-2 form-control">
                </div>
                <div class="position-relative form-group ">
                  <input name="recipe-desc" placeholder="keterangan" type="text" class="mr-2 form-control">
                </div>
                <button class="btn btn-primary" id="add-recipe-form" type="button">Tambah Obat</button>
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
        <div id="accordion" class="accordion-wrapper">
          <div class="card">
            <div id="headingOne" class="card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"
                aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Penyakit & Deskripsi Diagnosa</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
              <div class="card-body">
                <p>Penyakit yang diderita adalah <strong>{{ $diagnoses['diseaseName'] }}</strong></p>
                <p>{{ $diagnoses['desc'] }}</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div id="headingTwo" class="b-radius-0 card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false"
                aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Biaya Diagnosa</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne2" class="collapse">
              <div class="card-body">
                <h5>Rp. {{ $diagnoses['diagnoseCost'] }}</h5>
              </div>
            </div>
          </div>
          <div class="card">
            <div id="headingThree" class="card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false"
                aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Resep</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne3" class="collapse">
              <div class="card-body">
                <table class="mb-0 table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Obat</th>
                      <th>Aturan Pakai</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($diagnoses['recipes'] as $i => $r)
                    <tr>
                      <th scope="row">{{ $i+1 }}</th>
                      <td>{{ $r['medicineName'] }}</td>
                      <td>{{ $r['usageRule'] }}</td>
                      <td>{{ $r['recipeDesc'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>
</div>
@endsection