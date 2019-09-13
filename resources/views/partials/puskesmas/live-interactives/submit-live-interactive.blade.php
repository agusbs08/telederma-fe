@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-eyedropper icon-gradient bg-plum-plate">
        </i>
      </div>
      <div>Pengajuan Live Interactive dengan Dokter
        <div class="page-title-subheading">Diajukan pada.
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
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
  </div>
</div>
@endsection