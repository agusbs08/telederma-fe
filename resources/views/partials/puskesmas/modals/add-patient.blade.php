{{-- nik, nama, tanggal lahir, alamat, username --}}
<div class="modal fade" id="addPatientFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="">
          <div class="position-relative form-group"><label for="nik" class="">NIK</label><input name="nik" id="nik"
              placeholder="contoh: 1111222233334444" type="number" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama</label><input name="name" id="name"
              placeholder="contoh: Joko Widodo" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="" class="">Tanggal Lahir</label>
            <input name="birth-date" id="birth-date" type="text" placeholder="contoh: 12/07/2019" class="form-control"
              data-toggle="datepicker" />
          </div>
          <div class="position-relative form-group">
            <label for="address" class="">Alamat</label>
            <textarea name="address" id="address" class="form-control" name="address" id="address"
              placeholder="contoh: Jalan Kebayoran Barat"></textarea>
          </div>
          <div class="position-relative form-group"><label for="username" class="">No. Telepon</label><input
              name="phone" id="phone" placeholder="contoh: 081244445555" type="text" class="form-control"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="submitPatient()">Simpan</button>
      </div>
    </div>
  </div>
</div>