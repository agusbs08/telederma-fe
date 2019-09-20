@if (Request::segment(1) == "puskesmas" && Request::segment(2) == "patients")
@include('partials.puskesmas.modals.add-patient')
@elseif (Request::segment(1) == "puskesmas" && Request::segment(2) == "officers")
@include('partials.puskesmas.modals.add-officer')
@elseif (Request::segment(1) == "admin" && Request::segment(2) == "doctors")
@include('partials.admin.modals.add-doctor')
@elseif (Request::segment(1) == "admin" && Request::segment(2) == "puskesmas")
@include('partials.admin.modals.add-puskesmas')
@elseif (Request::segment(1) == "admin" && Request::segment(2) == "hospitals")
@include('partials.admin.modals.add-hospital')
@endif

@switch($pagename)
@case("puskesmas.get-patient-details-view")
@include('partials.puskesmas.modals.add-live-subs')
@break
@default
@endswitch