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
      <form action="{{ route('admin.submit-hospital') }}" method="POST" class="">
        <div class="modal-body">
          <div class="position-relative form-group"><label for="phone" class="">Telepon</label><input required
              name="phone" id="phone" placeholder="contoh: 0355-555-666" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama RS</label><input required
              name="name" id="name" placeholder="contoh: Rumah Sakit Bhayangkara" type="text" class="form-control">
          </div>
          <div class="position-relative form-group"><label for="address" class="">Alamat</label><input required
              name="address" id="address" placeholder="contoh: Jl Medang 53, Kemang, Jakarta Barat" type="text"
              class="form-control">
          </div>
          <div class="position-relative form-group"><label for="about" class="">Sekilas tentang RS</label>
            <textarea required name="about" id="about" cols="30" rows="4" class="form-control"
              placeholder="contoh: Rumah Sakit ini memiliki lebih dari 30 dokter ..."></textarea>
          </div>
          <div class="position-relative form-group"><label for="website" class="">Website</label><input required
              name="website" id="website" placeholder="contoh: www.rumahsakit.com" type="text" class="form-control">
          </div>
          @csrf
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>