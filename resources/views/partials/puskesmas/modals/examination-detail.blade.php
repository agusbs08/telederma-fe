{{-- modal for examination details --}}
<div class="modal fade" id="examinationDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Puskesmas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="accordion" class="accordion-wrapper mb-3">
          <div class="card">
            <div id="headingOne" class="card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"
                aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Deskripsi Gejala dan Keluhan</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
              <div class="card-body">
                <p>Dokter Pemeriksa: </p>
                <strong>
                  <p class="examination-doctor-name">loading ...</p>
                </strong>
                <p>Rumah Sakit Pemeriksa: </p>
                <strong>
                  <p class="examination-hospital-name">loading ...</p>
                </strong>
                <p>Petugas Penerima: </p>
                <strong>
                  <p class="examination-officer-name">loading ...</p>
                </strong>
                <p>Deskripsi: </p>
                <strong>
                  <p class="examination-desc">loading ...</p>
                </strong>
              </div>
            </div>
          </div>
          <div class="card">
            <div id="headingTwo" class="b-radius-0 card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false"
                aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Foto-foto Pemeriksaan</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne2" class="collapse">
              <div class="card-body">
                <div class="examination-image-wrapper">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

{{-- modal for examination results --}}
<div class="modal fade" id="examinationResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hasil Diagnosa Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger fade show examination-check-status-label" role="alert">
          Dokter belum melakukan diagnosa.
        </div>
        <div id="accordion" class="accordion-wrapper mb-3 diagnoses-result-wrapper">
          <div class="card">
            <div id="headingOne" class="card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"
                aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Hasil Diagnosa</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
              <div class="card-body">
                <p>Dokter dan RS pemeriksa: </p>
                <strong>
                  <p class="diagnose-doctor-name">loading ...</p>
                </strong>
                <p>Penyakit terdiagnosa: </p>
                <strong>
                  <p class="disease-name">loading ...</p>
                </strong>
                <p>Keterangan diagnosa: </p>
                <strong>
                  <p class="diagnoses-desc">loading ...</p>
                </strong>
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
                <strong>
                  <h3 class="diagnose-cost">loading ...</h3>
                </strong>
              </div>
            </div>
          </div>
          <div class="card">
            <div id="headingThree" class="card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false"
                aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Resep dari Dokter</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne3" class="collapse">
              <div class="card-body">
                <table class="mb-0 table recipe-table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Obat</th>
                      <th>Aturan Pakai</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>