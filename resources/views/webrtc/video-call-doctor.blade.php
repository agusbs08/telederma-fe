<html>

<head>
  <title>Tele-Conference Patient</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/video-call.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.cba69814a806ecc7945a.css') }}">
  <script>
    window.csrfToken = "{{ csrf_token() }}";
  </script>
</head>

<body>
  <div class="video-container">
    <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
    <video id="remoteview" class="user-video" src="" autoplay="true"></video>
  </div>
  <span id="myid"> </span>
  <button id="endCall" style="display: none;" onclick="endCurrentCall()">End Call </button>
  <canvas id="canvas-sc" width="640" height="480"></canvas>
  <button id="takeSc" onclick="snap()">snapshot</button>

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
          <input name="password" id="disease-name" placeholder="tuliskan nama penyakit kulit yang diderita" type="text"
            class="form-control">
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
</body>
<script src="{{ asset('js/main.cba69814a806ecc7945a.js') }}"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/video-call-doctor.js') }}"></script>

</html>