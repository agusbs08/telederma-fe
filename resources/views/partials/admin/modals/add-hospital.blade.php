<div class="modal fade" id="addHospitalFormModal" tabindex="-1" role="dialog" aria-labelledby="addHospitalFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Rumah Sakit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="">
          <div class="position-relative form-group"><label for="phone" class="">Telepon</label><input name="phone"
              id="phone" placeholder="contoh: 0355-555-666" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama RS</label><input name="name"
              id="name" placeholder="contoh: Rumah Sakit Bhayangkara" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="address" class="">Alamat</label><input name="address"
              id="address" placeholder="contoh: Jl Medang 53, Kemang, Jakarta Barat" type="text" class="form-control">
          </div>
          <div class="position-relative form-group"><label for="about" class="">Sekilas tentang RS</label>
            <textarea name="about" id="about" cols="30" rows="4" class="form-control"
              placeholder="contoh: Rumah Sakit ini memiliki lebih dari 30 dokter ..."></textarea>
          </div>
          <div class="position-relative form-group"><label for="website" class="">Website</label><input name="website"
              id="website" placeholder="contoh: www.rumahsakit.com" type="text" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="submitHospital()">Simpan</button>
      </div>
    </div>
  </div>
</div>