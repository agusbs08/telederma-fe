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
              <div class="card-body">1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                nesciunt
                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                nesciunt
                sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                VHS.
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
              <div class="card-body">2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                nesciunt
                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                nesciunt
                sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                VHS.
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
        <div id="accordion" class="accordion-wrapper mb-3">
          <div class="card">
            <div id="headingOne" class="card-header">
              <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"
                aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                <h5 class="m-0 p-0">Deskripsi Hasil Diagnosa</h5>
              </button>
            </div>
            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
              <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                nesciunt
                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                nesciunt
                sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                VHS.
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
                <h3><strong>Rp. 50.000</strong></h3>
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
                <table class="mb-0 table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Obat</th>
                      <th>Aturan Pakai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Paracetamol</td>
                      <td>2x3</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Paracetamol</td>
                      <td>2x3</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Paracetamol</td>
                      <td>2x3</td>
                    </tr>
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