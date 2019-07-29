@extends('base')
@section('content')
<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
  <li class="nav-item">
    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
      <span>Detail Pemeriksaan Puskesmas</span>
    </a>
  </li>
  <li class="nav-item">
    <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
      <span>Hasil Diagnosa Dokter</span>
    </a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-header"><i class="header-icon lnr-text-align-left icon-gradient bg-plum-plate"> </i>Deskripsi
            Pemeriksaan
          </div>
          <div class="card-body">
            <p>With supporting text below as a natural lead-in to additional content.</p>
            <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
              unknown printer took a galley of type and scrambled.</p>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-header"><i class="header-icon lnr-camera-video icon-gradient bg-plum-plate"> </i>Foto
            Pemeriksaan
          </div>
          <div class="card-body">
            <p>With supporting text below as a natural lead-in to additional content.</p>
            <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
              unknown printer took a galley of type and scrambled.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
    <div class="row">
      <div class="col-md-12">
        <div class="main-card mb-3 card">
          <div class="card-header"><i class="header-icon lnr-text-align-left icon-gradient bg-plum-plate"> </i>Deskripsi
            Diagnosa
          </div>
          <div class="card-body">
            <p>With supporting text below as a natural lead-in to additional content.</p>
            <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
              unknown printer took a galley of type and scrambled.</p>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-header"><i class="header-icon lnr-tag icon-gradient bg-plum-plate"> </i>Biaya
            Diagnosa
          </div>
          <div class="card-body">
            <h3><strong>Rp. 50.000</strong></h3>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-header"><i class="header-icon lnr-heart-pulse icon-gradient bg-plum-plate"> </i>Resep dari
            Dokter
          </div>
          <div class="card-body">
            <table class="mb-0 table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Obat</th>
                  <th>Aturan Pakai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Paracetamol</td>
                  <td>2x3</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Paracetamol</td>
                  <td>2x3</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Paracetamol</td>
                  <td>2x3</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
    <div class="row">
      <div class="col-md-12">
        <div class="mb-3 card">
          <div class="tabs-lg-alternate card-header">
            <ul class="nav nav-justified">
              <li class="nav-item">
                <a data-toggle="tab" href="#tab-eg9-0" class="active nav-link">
                  <div class="widget-number">Tab 1</div>
                  <div class="tab-subheading">
                    <span class="pr-2 opactiy-6">
                      <i class="fa fa-comment-dots"></i>
                    </span>
                    Totals
                  </div>
                </a></li>
              <li class="nav-item">
                <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                  <div class="widget-number">Tab 2</div>
                  <div class="tab-subheading">Products</div>
                </a>
              </li>
              <li class="nav-item">
                <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                  <div class="widget-number text-danger">Tab 3</div>
                  <div class="tab-subheading">
                    <span class="pr-2 opactiy-6">
                      <i class="fa fa-bullhorn"></i>
                    </span>
                    Income
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
              <div class="card-body">
                <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                  unknown printer took a galley of type and scrambled it to make a type specimen book.
                  It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                  essentially unchanged. </p>
              </div>
            </div>
            <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
              <div class="card-body">
                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                  has been the industry's standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a type specimen book. It has survived not only
                  five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
            </div>
            <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
              <div class="card-body">
                <p class="mb-0">It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                  Ipsum passages, and more recently with desktop publishing software like Aldus
                  PageMaker including versions of Lorem Ipsum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Basic</h5>
            <ul class="nav nav-tabs">
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-0" class="active nav-link">Tab 1</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-1" class="nav-link">Tab 2</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg10-2" class="nav-link">Tab 3</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-eg10-0" role="tabpanel">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                  and more recently with desktop publishing
                  software like Aldus PageMaker
                  including versions of Lorem Ipsum.</p>
              </div>
              <div class="tab-pane" id="tab-eg10-1" role="tabpanel">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a
                  galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
              <div class="tab-pane" id="tab-eg10-2" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Justified Alignment</h5>
            <ul class="nav nav-tabs nav-justified">
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">Tab 1</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1" class="nav-link">Tab 2</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2" class="nav-link">Tab 3</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                  and more recently with desktop publishing
                  software like Aldus PageMaker
                  including versions of Lorem Ipsum.</p>
              </div>
              <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a
                  galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
              <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Tabs Variations</h5>
            <div class="mb-3">
              <div role="group" class="btn-group-sm nav btn-group">
                <a data-toggle="tab" href="#tab-eg12-0" class="btn-pill pl-3 active btn btn-warning">Tab 1</a>
                <a data-toggle="tab" href="#tab-eg12-1" class="btn btn-warning">Tab 2</a>
                <a data-toggle="tab" href="#tab-eg12-2" class="btn-pill pr-3  btn btn-warning">Tab 3</a>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-eg12-0" role="tabpanel">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                  and more recently with desktop publishing
                  software like Aldus PageMaker
                  including versions of Lorem Ipsum.</p>
              </div>
              <div class="tab-pane" id="tab-eg12-1" role="tabpanel">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a
                  galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
              <div class="tab-pane" id="tab-eg12-2" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Pills</h5>
            <ul class="nav nav-pills">
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-0" class="active nav-link">Pill 1</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-1" class="nav-link">Pill 2</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-2" class="nav-link">Pill 3</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-eg13-0" role="tabpanel">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                  and more recently with desktop publishing
                  software like Aldus PageMaker
                  including versions of Lorem Ipsum.</p>
              </div>
              <div class="tab-pane" id="tab-eg13-1" role="tabpanel">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a
                  galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
              <div class="tab-pane" id="tab-eg13-2" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Pills</h5>
            <ul class="nav nav-pills nav-fill">
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-0" class="active nav-link">Pill 1</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-1" class="nav-link">Pill 2</a></li>
              <li class="nav-item"><a data-toggle="tab" href="#tab-eg14-2" class="nav-link">Pill 3</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-eg14-0" role="tabpanel">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                  and more recently with desktop publishing
                  software like Aldus PageMaker
                  including versions of Lorem Ipsum.</p>
              </div>
              <div class="tab-pane" id="tab-eg14-1" role="tabpanel">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a
                  galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. </p>
              </div>
              <div class="tab-pane" id="tab-eg14-2" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Button Group Tabs</h5>
            <div class="mb-3 text-center">
              <div role="group" class="btn-group-sm nav btn-group">
                <a data-toggle="tab" href="#tab-eg15-0" class="btn-shadow active btn btn-primary">Tab 1</a>
                <a data-toggle="tab" href="#tab-eg15-1" class="btn-shadow  btn btn-primary">Tab 2</a>
                <a data-toggle="tab" href="#tab-eg15-2" class="btn-shadow  btn btn-primary">Tab 3</a>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-eg15-0" role="tabpanel">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                  and more recently with desktop publishing
                  software like Aldus PageMaker
                  including versions of Lorem Ipsum.</p>
              </div>
              <div class="tab-pane" id="tab-eg15-1" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
              <div class="tab-pane" id="tab-eg15-2" role="tabpanel">
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                  took a galley of type and scrambled it to make a
                  type specimen book. It has not only five centuries, but also the leap into not only five centuries,
                  but also the leap into
                  survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection