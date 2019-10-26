@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-config icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div><strong>Pengaturan Akun</strong></div>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-header">
    Foto Profil
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <img class="profile-picture-box" src="{{ $user_data['profilePicture'] }}" alt="foto-profil"
          style="width:100%;max-width:250px;">
      </div>
      <div class="col-8">
        <div class="row">
          <form action="{{ route('update-account-profile-picture') }}" method="POST" enctype="multipart/form-data"
            id="profile-pic-setting">
            @csrf
            <input name="profile-picture" id="profile-pic-upload" type="file" class="form-control"
              style="display: none;">
            <button class="mb-2 mr-2 btn-icon btn btn-primary" onclick="profilePictureInput();"><i
                class="pe-7s-pen btn-icon-wrapper"> </i>Upload Foto</button>
            <button id="save-profile-pic" class="mb-2 mr-2 btn-icon btn btn-success" style="display: none;"
              type="submit">
              <i class="pe-7s-cloud-upload btn-icon-wrapper">
              </i>Simpan
            </button>
          </form>
        </div>
        <div class="row">
          @if (session('prof-pic-update-success'))
          <a style="color: green; float: left;">
            </i>{{ session('prof-pic-update-success') }}</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <form id="account-setting" action="{{ route('update-account-general') }}" method="POST">
    <div class="card-header">Pengaturan Umum</div>
    <div class="card-body">
      <table class="mb-0 table table-hover">
        <tbody>
          <tr>
            <th scope="row">Email</th>
            <td><input name="email" type="text" class="form-control setting-input" disabled required
                value="{{ $user_data['email'] }}"></td>
          </tr>
          <tr>
            <th scope="row">Nama</th>
            <td><input name="name" type="text" class="form-control setting-input" disabled required
                value="{{ $user_data['name'] }}"></td>
          </tr>
          <tr>
            <th scope="row">Telepon</th>
            <td><input name="phone" type="text" class="form-control setting-input" disabled required
                value="{{ $user_data['phone'] }}"></td>
          </tr>
          <tr>
            <th scope="row">No. Identitas</th>
            <td><input name="identity-number" type="text" class="form-control setting-input" disabled required
                value="{{ $user_data['identityNumber'] }}">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    @csrf
    <div class="d-block text-right card-footer">
      @if (session('general-info-update-success'))
      <a style="color: green; float: left;">
        </i>{{ session('general-info-update-success') }}</a>
      @endif
      <a class="mr-2 btn btn-link btn-sm" onclick="toggleInput();">Klik disini untuk edit</a>
      <button class="btn btn-primary submit-btn" type="submit" disabled>Simpan</button>
    </div>
  </form>
</div>
@endsection
{{-- @php
dd($user_data);
@endphp --}}