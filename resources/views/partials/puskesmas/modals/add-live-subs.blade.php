<div class="modal fade" id="addLiveSubsFormModal" tabindex="-1" role="dialog" aria-labelledby="addLiveSubsFormModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" method="POST" action="{{ route('puskesmas.submit-live-interactive') }}">
        <div class=" modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pengajuan Live Interactive</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input required type="hidden" name="patient-id" value="{{ $user_details['_id'] }}">
          <input required type="hidden" name="patient-nik" value="{{ $user_details['nik'] }}">
          <input required type="hidden" name="patient-name" value="{{ $user_details['name'] }}">
          <input required type="hidden" name="patient-dob" value="{{ $user_details['dob'] }}">
          <div class="position-relative form-group">
            <label for="" class="">Rumah Sakit Tujuan</label>
            <select name="hospital" id="" class="form-control" required>
              @foreach ($hospitals as $h)
              <option value="{{ $h['name'] }}">{{ $h['name'] }}</option>
              @endforeach
            </select>
          </div>
          <div class="position-relative form-group">
            <label for="" class="">Petugas Klinik</label>
            <select name="officer" id="" class="form-control" required>
              @foreach ($officers as $officer)
              <option value="{{ $officer['name'] }}">{{ $officer['name'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
        @csrf
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Ajukan</button>
        </div>
      </form>
    </div>
  </div>
</div>