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
            <div class="position-relative form-group"><label for="exampleEmail5">Hasil pemeriksaan awal (gejala dan
                keluhan dari pasien).</label><textarea rows="1" class="form-control autosize-input"
                style="height: 35px;"></textarea>
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
                    <p>Unggah foto dari kamera mikroskopis.</p>
                  </span>
                </button>
              </div>
              <div data-parent="#accordion" id="collapseTwo" class="collapse show">
                <div class="card-body">
                  <div class="position-relative form-group"><label for="exampleFile" class="">Gambar</label>
                    <input name="file" id="exampleFile" type="file" class="form-control-file" multiple="multiple">
                    <small class="form-text text-muted">Anda dapat mengupload maksimal 5 gambar.</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="step-322">
          <div class="no-results">
            <div class="swal2-icon swal2-success swal2-animate-success-icon">
              <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
              <span class="swal2-success-line-tip"></span>
              <span class="swal2-success-line-long"></span>
              <div class="swal2-success-ring"></div>
              <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
              <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>
            <div class="results-subtitle mt-4">Selesai!</div>
            <div class="results-title">Periksa hasil pemeriksaan dan klik 'Submit' untuk mengirim ke dokter!</div>
            <div class="mt-3 mb-3"></div>
            <div class="text-center">
              <button class="btn-shadow btn-wide btn btn-success btn-lg">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="divider"></div>
    <div class="clearfix">
      <button type="button" id="reset-btn22" class="btn-shadow float-left btn btn-link">Reset</button>
      <button type="button" id="next-btn22"
        class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
      <button type="button" id="prev-btn22"
        class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
    </div>
  </div>
</div>
@endsection