<div class="modal fade" id="addPuskesmasFormModal" tabindex="-1" role="dialog" aria-labelledby="addPuskesmasFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Klinik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.submit-clinic') }}" method="POST">
        <div class="modal-body">
          <div class="position-relative form-group"><label for="email" class="">Email</label><input required
              name="email" id="email" placeholder="Tuliskan email ..." type="email" class="form-control"></div>
          <div class="position-relative form-group"><label for="name" class="">Nama Puskesmas</label><input required
              name="name" id="name" placeholder="Tuliskan nama klinik ..." type="text" class="form-control"></div>
          <div class="position-relative form-group"><label for="phone" class="">Telepon</label><input required
              name="phone" id="phone" placeholder="Tuliskan telepon klinik ..." type="text" class="form-control">
          </div>
          <div class="position-relative form-group"><label for="identity-number" class="">No. Klinik /
              Puskesmas</label><input required name="identityNumber" id="identity-number"
              placeholder="Tuliskan no. klinik ..." type="text" class="form-control"></div>
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