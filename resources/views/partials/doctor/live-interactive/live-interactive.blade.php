@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-eyedropper icon-gradient bg-plum-plate">
        </i>
      </div>
      <div>Live Interactive
      </div>
    </div>
  </div>
</div>
<div id="video-element">
  <div class="video-container">
    <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
    <video id="remoteview" class="user-video" src="" autoplay="true" muted="muted"></video>
  </div>
  <span id="myid"></span>
  <button id="endCall" style="display: none;" onclick="endCurrentCall()">End Call </button>
  <canvas id="canvas-sc" width="640" height="480"></canvas>
  <button class="btn btn-primary" id="takeSc" onclick="snap()">Ambil Gambar</button>
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
      {{-- <input id="inp_img" name="img" type="file" value="" style="display: none;"> --}}
      {{-- <input name="file" id="examination-image" type="file" class="form-control-file" multiple="multiple"
        style="display: none;"> --}}
      <input id="inp_img" name="img" type="hidden" value="" multiple="multiple">
      <div class="d-block text-center card-footer">
        <button href="" class="btn-wide btn-shadow btn btn-block btn-primary" onclick="submitLiveExamination()">Submit
          Hasil
          Diagnosa</button>
      </div>
    </div>
  </div>
</div>
@endsection