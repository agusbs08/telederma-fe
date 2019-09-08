<div class="modal fade" id="addDoctorFormModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="">
          <div class="position-relative form-group"><label for="email" class="">Email</label><input name="email"
              id="email" placeholder="contoh: doctor@email.com" type="email" class="form-control"></div>
          <div class="position-relative form-group"><label for="nik" class="">NIK</label><input name="nik" id="nik"
              placeholder="contoh: 1111222233334444" type="number" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama</label><input name="name" id="name"
              placeholder="contoh: John Doe" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="exampleAddress" class="">Tanggal Lahir</label>
            <input name="birth-date" id="birth-date" type="text" placeholder="contoh: 12/07/2019" class="form-control"
              data-toggle="datepicker" />
          </div>
          <div class="position-relative form-group"><label for="username" class="">Username</label><input
              name="username" id="username" placeholder="contoh: johndoe" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="phone" class="">Telepon/HP</label><input name="username"
              id="phone" placeholder="contoh: 0888888888888" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="password" class="">Password</label><input
              name="password" id="password" placeholder="***********" type="password" class="form-control"></div>
          <div class="position-relative form-group"><label for="confirm-password" class="">Konfirmasi
              Password</label><input name="confirm-password" id="confirm-password" placeholder="***********"
              type="password" class="form-control"></div>
          <div class="position-relative form-group">
            <label for="hospital" class="">Rumah Sakit Dinas</label>
            <select name="hospital" id="hospital" class="form-control">
              <option value="" selected disabled>Pilih rumah sakit :</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="submitDoctor()">Simpan</button>
      </div>
    </div>
  </div>
</div>