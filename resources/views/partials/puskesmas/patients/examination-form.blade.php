@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-users icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div>Input Hasil Pemeriksaan
      </div>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <div id="smartwizard3" class="forms-wizard-vertical">
      <ul class="forms-wizard">
        <li>
          <a href="#step-122">
            <em>1</em><span>Gejala dan Keluhan</span>
          </a>
        </li>
        <li>
          <a href="#step-222">
            <em>2</em><span>Gambar Pemeriksaan</span>
          </a>
        </li>
        <li>
          <a href="#step-322">
            <em>3</em><span>Submit</span>
          </a>
        </li>
      </ul>
      <div class="form-wizard-content">
        <div id="step-122">
          <div class="card-body">
            <div class="position-relative form-group"><label for="">Hasil pemeriksaan awal (gejala dan
                keluhan dari pasien).</label><textarea rows="1" class="form-control autosize-input"
                style="height: 35px;" id="description" placeholder="Tuliskan hasil pemeriksaan disini ..."></textarea>
              <div class="invalid-feedback">You will not be able to see this</div>
              <small class="form-text text-muted">Isikan secara detail agar dokter lebih mudah dalam melakukan
                diagnosa.</small>
            </div>
          </div>
        </div>
        <div id="step-222">
          <div id="accordion" class="accordion-wrapper mb-3">
            <div class="card">
              <div id="headingTwo" class="b-radius-0 card-header">
                <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                  aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
                  <span class="form-heading">Upload Foto Pemeriksaan
                    <p>Unggah foto dari PC Anda</p>
                  </span>
                </button>
              </div>
              <div data-parent="#accordion" id="collapseTwo" class="collapse show">
                <div class="card-body">
                  <div class="position-relative form-group">
                    <label for="exampleFile" class="">Preview Foto</label>
                    <input name="file" id="examination-image" type="file" class="form-control-file" accept="image/*">

                    <small class="form-text text-muted">Silakan mengupload foto penyakit secara jelas dan mudah diamati
                      dokter.</small>
                    <div id="loading-spinner" style="margin: 30px 10px 30px 10px; display: none;"
                      class="loader-wrapper justify-content-center align-items-center">
                      <h5 class="card-title">Analyzing . . .</h5>
                      <div class="loader">
                        <div class="ball-grid-beat">
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                          <div></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card main-card element-block-example" id="examination-image-preview-card" style="display: none">
              <div class="card-header"><i class="header-icon lnr-camera icon-gradient bg-warm-flame"> </i>Preview Foto
              </div>
              <img id="examination-image-preview" src="#" alt="skin image" style="width:100%;" class="img-responsive" />
            </div>
            <div class="card automated-diagnose-wrapper" style="display: none;">
              <div class="card-header"><i class="header-icon lnr-screen icon-gradient bg-warm-flame"> </i>Hasil
                Diagnosa
                Otomatis Sistem
              </div>
              <div class="card-body">
                <ul class="nav flex-column automated-diagnose-result-wrapper">
                </ul>
              </div>
            </div>
          </div>

        </div>
        <div id="step-322">
          <div class="position-relative form-group"><label for="exampleEmail5">Pilih Rumah Sakit yang Akan
              Menangani.</label>
            <select class="multiselect-dropdown form-control" id="hospital">
              <optgroup label="Nama Rumah Sakit">
                @foreach ($hospitals as $hospital)
                <option value="{{ $hospital['name'] }}">{{ $hospital['name'] }} </option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="position-relative form-group"><label for="exampleEmail5">Petugas puskesmas/klinik yang
              menerima:</label>
            <select class="multiselect-dropdown form-control" id="officer">
              <optgroup label="Nama Petugas Klinik">
                @foreach ($officers as $officer)
                <option value="{{ $officer['name'] }}">{{ $officer['name'] }} </option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="text-center">
            <button class="btn-shadow btn-block btn-wide btn btn-success btn-lg mr-2 mb-2 block-page-btn-example-3"
              onclick="submitExamination()">SUBMIT</button>
          </div>
          <div class="no-results">
            <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: none;">
              <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
              <span class="swal2-success-line-tip"></span>
              <span class="swal2-success-line-long"></span>
              <div class="swal2-success-ring"></div>
              <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
              <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="body-block-example-3 d-none">
      <div class="loader">
        <div class="line-scale-pulse-out">
          <div class="bg-warning"></div>
          <div class="bg-warning"></div>
          <div class="bg-warning"></div>
          <div class="bg-warning"></div>
          <div class="bg-warning"></div>
        </div>
      </div>
    </div>
    <div class="divider"></div>
    <div class="clearfix">
      <button type="button" id="next-btn22"
        class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Lanjut</button>
      <button type="button" id="prev-btn22"
        class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Kembali</button>
    </div>
  </div>
</div>
@endsection