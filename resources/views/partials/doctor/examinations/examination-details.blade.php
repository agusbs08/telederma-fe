@extends('base')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="mb-3 card">
      <div class="card-header card-header-tab-animation">
        <ul class="nav nav-justified">
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="nav-link show active">Deskripsi
              Pemeriksaan</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link show">Foto-foto Pemeriksaan</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane show active" id="tab-eg115-0" role="tabpanel">
            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
              more recently with desktop publishing
              software like Aldus PageMaker
              including versions of Lorem Ipsum.</p>
          </div>
          <div class="tab-pane show" id="tab-eg115-1" role="tabpanel">
            <p>Like Aldus PageMaker including versions of Lorem. It has survived not only five centuries, but also the
              leap into electronic typesetting, remaining
              essentially unchanged. </p>
          </div>
        </div>
      </div>
      <div class="d-block text-center card-footer">
        <a href="javascript:void(0);" class="btn-wide btn-shadow btn btn-block btn-primary">Lakukan Diagnosa</a>
      </div>
    </div>
  </div>
</div>
@endsection