@extends('base')
@section('content')
<div class="col-md-12 col-lg-6 col-xl-12">
  <div class="card-shadow-primary profile-responsive card-border mb-3 card">
    <div class="dropdown-menu-header">
      <div class="dropdown-menu-header-inner bg-focus">
        <div class="menu-header-image opacity-3"
          style="background-image: url('{{  asset('images/dropdown-header/city4.jpg') }}"></div>
        <div class="menu-header-content btn-pane-right">
          <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
            <div class="avatar-icon rounded"><img src="{{ $doctor_detail['profilePicture'] }}" alt="Avatar 5"></div>
          </div>
          <div>
            <h5 class="menu-header-title">{{ $doctor_detail['name'] }}</h5>
            <h6 class="menu-header-subtitle">{{ $doctor_detail['identityNumber'] }}</h6>
            <h6 class="menu-header-subtitle">{{ $doctor_detail['phone'] . ' | ' . $doctor_detail['email'] }}</h6>
            <h6 class="menu-header-subtitle">{{ $doctor_detail['hospital'] }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mb-3 card">
    <div class="card-header-tab card-header">
      <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
        <i class="header-icon lnr-chart-bars icon-gradient bg-amy-crisp"> </i>
        Performa & Portfolio
      </div>
    </div>
    <div class="no-gutters row">
      <div class="col-sm-6 col-md-4 col-xl-4">
        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
          <div class="icon-wrapper rounded-circle">
            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
            <i class="lnr-cloud-upload text-dark opacity-8"></i>
          </div>
          <div class="widget-chart-content">
            <div class="widget-subheading">Store & Forward</div>
            <div class="widget-numbers">{{ $doctor_detail['numberOfSAF'] }}</div>
          </div>
        </div>
        <div class="divider m-0 d-md-none d-sm-block"></div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-4">
        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
          <div class="icon-wrapper rounded-circle">
            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
            <i class="lnr-camera-video text-white"></i>
          </div>
          <div class="widget-chart-content">
            <div class="widget-subheading">Live Interactive</div>
            <div class="widget-numbers"><span>{{ $doctor_detail['numberOfLI'] }}</span></div>
          </div>
        </div>
        <div class="divider m-0 d-md-none d-sm-block"></div>
      </div>
      <div class="col-sm-12 col-md-4 col-xl-4">
        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
          <div class="icon-wrapper rounded-circle">
            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
            <i class="lnr-smile text-white"></i>
          </div>
          <div class="widget-chart-content">
            <div class="widget-subheading">Total Rating</div>
            <div class="widget-numbers text-success">
              <span>
                @if ($doctor_detail['votes'] != '0')
                {{ $doctor_detail['stars'] / $doctor_detail['votes'] }}
                @else
                0
                @endif
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mb-3 card">
    <div class="card-header-tab card-header">
      <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
        <i class="header-icon lnr-history icon-gradient bg-amy-crisp"> </i>
        Log Aktifitas
      </div>
    </div>
    <div class="scroll-area-lg">
      <div class="scrollbar-container ps ps--active-y">
        <div class="p-4">
          <div
            class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
            <div class="vertical-timeline-item dot-success vertical-timeline-element">
              <div>
                <span class="vertical-timeline-element-icon bounce-in"></span>
                <div class="vertical-timeline-element-content bounce-in">
                  <h4 class="timeline-title">{{ $doctor_detail['name'] }} melakukan live interactive -
                    <span class="text-success">15:23 WIB</span>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
          <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
          <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 197px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection