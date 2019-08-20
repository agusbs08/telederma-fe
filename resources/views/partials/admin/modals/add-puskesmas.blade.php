<div class="modal fade" id="addPuskesmasFormModal" tabindex="-1" role="dialog" aria-labelledby="addPuskesmasFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Puskesmas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="">
          <div class="position-relative form-group"><label for="email" class="">Email</label><input name="email"
              id="email" placeholder="contoh: user@email.com" type="email" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama Puskesmas</label><input name="name"
              id="name" placeholder="contoh: Joko Widodo" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="username" class="">Username</label><input
              name="username" id="username" placeholder="contoh: jokowi" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="phone" class="">Telepon</label><input name="username"
              id="phone" placeholder="contoh: 032332" type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="identity-number" class="">No. Klinik /
              Puskesmas</label><input name="username" id="identity-number" placeholder="contoh: 3332341233" type="text"
              class="form-control"></div>
          <div class="position-relative form-group"><label for="password" class="">Password</label><input
              name="password" id="password" placeholder="***********" type="password" class="form-control"></div>
          <div class="position-relative form-group"><label for="confirm-password" class="">Konfirmasi
              Password</label><input name="confirm-password" id="confirm-password" placeholder="***********"
              type="password" class="form-control"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="submitPuskesmas()">Simpan</button>
      </div>
    </div>
  </div>
</div>