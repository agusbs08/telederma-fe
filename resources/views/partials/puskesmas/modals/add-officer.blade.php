<div class="modal fade" id="addOfficerFormModal" tabindex="-1" role="dialog" aria-labelledby="addOfficerFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" method="POST" action="{{ route('puskesmas.register-officer') }}">
        <div class=" modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftarkan Petugas Klinik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="position-relative form-group"><label for="nik" class="">Nomor Identitas</label><input name="nik"
              id="nik" placeholder="contoh: 1111222233334444" type="number" class="form-control" required></div>
          <div class="position-relative form-group"><label for="name" class="">Nama</label><input name="name" id="name"
              placeholder="contoh: Baharuddin Jusuf" type="text" class="form-control" required></div>
          <div class="position-relative form-group"><label for="" class="">Tanggal Lahir</label>
            <input name="birth-date" id="birth-date" type="text" placeholder="contoh: 12/07/2019" class="form-control"
              data-toggle="datepicker" required />
          </div>
          <div class="position-relative form-group">
            <label for="" class="">Jenis Kelamin</label>
            <select name="gender" id="" class="form-control" required>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
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