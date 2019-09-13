@extends('base')
@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-shield icon-gradient bg-tempting-azure">
        </i>
      </div>
      <div><strong>Pengaturan Keamanan dan Login</strong></div>
    </div>
  </div>
</div>
<div class="main-card mb-3 card">
  <form id="credential-setting" action="{{ route('update-password') }}" method="POST">
    <div class="card-header">Pengaturan Umum</div>
    <div class="card-body">
      <table class="mb-0 table table-hover">
        <tbody>
          <tr>
            <th scope="row">Password saat ini</th>
            <td><input name="current-password" type="password" class="form-control setting-input" required value="">
            </td>
          </tr>
          <tr>
            <th scope="row">Password baru</th>
            <td><input name="new-password" type="password" class="form-control setting-input" required value=""></td>
          </tr>
          <tr>
            <th scope="row">Ulangi password baru</th>
            <td><input name="re-new-password" type="password" class="form-control setting-input" required value=""></td>
          </tr>
        </tbody>
      </table>
    </div>
    @csrf
    <div class="d-block text-right card-footer">
      @if (session('password-update-success'))
      <a style="color: green; float: left;">
        </i>{{ session('password-update-success') }}!</a>
      @elseif (session('password-update-failed'))
      <a style="color: red; float: left;">
        </i>{{ session('password-update-failed') }}!</a>
      @endif
      <button class="btn btn-primary submit-btn" type="submit">Simpan</button>
    </div>
  </form>
</div>
@endsection