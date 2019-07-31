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
            <p>{{ $examination_details['description'] }}</p>
          </div>
          <div class="tab-pane show" id="tab-eg115-1" role="tabpanel">
            {{-- <div class="col-md-3">
              <div class="demo-image-bg" style="background-image: url('{{ asset('images/sidebar/abstract1.jpg') }}';">
          </div>
        </div> --}}
        @foreach ($examination_details['images'] as $i)
        <img src="{{ $i['image'] }}" alt="">
        @endforeach
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