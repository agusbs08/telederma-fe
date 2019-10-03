<div class="modal fade" id="addDoctorFormModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrasi Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('admin.submit-doctors') }}" name="registerControlForm"
        id="registerControlForm" onsubmit="submitDoctor();">
        <div class="modal-body">
          <div class="position-relative form-group"><label for="email" class="">Email</label><input required
              name="email" id="email" placeholder="Tulis email dokter ..." type="email" class="form-control"></div>
          <div class="position-relative form-group"><label for="nik" class="">Nomor Induk Pegawai</label><input required
              name="nik" id="nik" placeholder="Tulis NIP dokter ..." type="number" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama</label><input required name="name"
              id="name" placeholder="Tulis nama dokter (disertai dengan gelar lengkap)..." type="text"
              class="form-control"></div>
          <div class="position-relative form-group"><label for="exampleAddress" class="">Tanggal Lahir</label>
            <input required name="birth-date" id="birth-date" type="text" placeholder="Pilih tanggal lahir dokter ..."
              class="form-control" data-toggle="datepicker" />
          </div>
          <div class="position-relative form-group">
            <label for="gender" class="">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control">
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
          <div class="position-relative form-group"><label for="phone" class="">Telepon/HP</label><input required
              name="phone" id="phone" placeholder="Masukkan nomor ponsel ..." type="text" class="form-control"></div>
          <div class="position-relative form-group">
            <label for="hospital" class="">Rumah Sakit Dinas</label>
            <select name="hospital" id="hospital" class="form-control">
            </select>
          </div>
          <div class="alert alert-danger fade show" id="sub-msg" style="display: none;" role="alert">asd</div>
        </div>
        @csrf
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>