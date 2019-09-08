<div class="header-dots">
    {{-- add class named 'show' --}}
    <div class="dropdown notification-banner-toggled">
        {{-- aria-expanded change to 'true' --}}
        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
            class="p-0 mr-2 btn btn-link notification-banner-toggler">
            <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                <span class="icon-wrapper-bg bg-danger"></span>
                <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
            </span>
        </button>
        <div tabindex="-1" role="menu" aria-hidden="true" {{--  add  class named 'show' --}}
            class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right notification-banner-toggled">
            <div class="dropdown-menu-header mb-0">
                <div class="dropdown-menu-header-inner bg-deep-blue">
                    <div class="menu-header-image opacity-1"
                        style="background-image: url('{{ asset('images/dropdown-header/city3.jpg') }}">
                    </div>
                    <div class="menu-header-content text-dark">
                        <h5 class="menu-header-title">Pemberitahuan</h5>
                        <h6 class="menu-header-subtitle">Anda memeiliki <b id="notification-count">0</b> notifikasi
                            baru.</h6>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div>
                    <div class="scroll-area-sm">
                        <div class="scrollbar-container">
                            <div class="p-3">
                                <div
                                    class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                    {{-- @for ($i = 0; $i < 10; $i++) <div
                                        class="vertical-timeline-item vertical-timeline-element">
                                        <div><span class="vertical-timeline-element-icon bounce-in"><i
                                                    class="badge badge-dot badge-dot-xl badge-success">
                                                </i></span>
                                            <div class="vertical-timeline-element-content bounce-in">
                                                <h4 class="timeline-title">Dokter menanggapi pemeriksaan Anda</h4>
                                                <p>Hari ini pukul <a href="javascript:void(0);">09:44</a></p>
                                                <span class="vertical-timeline-element-date"></span>
                                            </div>
                                        </div>
                                </div>
                                @endfor --}}
                                    <div class="vertical-timeline-item vertical-timeline-element">
                                        <div><span class="vertical-timeline-element-icon bounce-in"><i
                                                    class="badge badge-dot badge-dot-xl badge-success">
                                                </i></span>
                                            <div class="vertical-timeline-element-content bounce-in">
                                                <h4 class="timeline-title">Tidak ada pemberitahuan.</h4>
                                                {{-- <p>Hari ini pukul <a href="javascript:void(0);">09:44</a></p> --}}
                                                <span class="vertical-timeline-element-date"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item-divider nav-item"></li>
                <li class="nav-item-btn text-center nav-item">
                    <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Lihat Semua Pemberitahuan</button>
                </li>
            </ul>
        </div>
    </div>
</div>