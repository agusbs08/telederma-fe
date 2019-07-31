<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('components.header')

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('components.navbar')
        @include('components.ui-theme-setting')
        <div class="app-main">
            @include('components.sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/main.cba69814a806ecc7945a.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    @if ($pagename == 'puskesmas.examination-form')
    <script>
        function submitExamination() {
            $.ajax({
                type: "POST",
                url: '{{ route("puskesmas.submit-examination") }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    doctorId: $('#doctor').val(),
                    hospitalId: 'hospital',
                    patientId: '{{ $patientId }}'
                },
                success: (data) => {
                    console.log(data);
                    $.ajax({
                        type: "POST",
                        url: '{{ route("puskesmas.submit-examination-result") }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            examinationId: data.examinationId,
                            description: $('#description').val()
                        },
                        success: (data) => {
                            console.log({'no':2, data})
                            let formData = new FormData()
                            formData.append('examinationId', data.examinationId)
                            formData.append('image', $('input[type=file]')[0].files[0])
                            $.ajax({
                                type: "POST",
                                url: '{{ route("puskesmas.submit-examination-image") }}',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: (data) => {
                                    console.log({'no':3, data})
                                    window.location = '/puskesmas/patients/{{$patientId}}/details'
                                },
                                error: (error) => {
                                    console.log(error)
                                }
                            });
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    });
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
    </script>
    @elseif($pagename == 'puskesmas.get-patient-list-view')
    <script>
        function submitPatient(){
            const data = {
                nik: $('#nik').val(),
                name: $('#name').val(),
                birthDate: $('#birth-date').val(),
                address: $('#address').val(),
                username: $('#username').val(),
                email: $('#email').val()
            }
            $.ajax({
                type: "POST",
                url: '{{ route("auth.signupPatient") }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: data,
                success: (res) => {
                    // console.log(res);
                    location.reload();
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
    </script>
    @endif
</body>

</html>

{{-- modals --}}
@if (Request::segment(1) == "puskesmas" && Request::segment(2) == "patients" && Request::segment(4) == "details")
@include('partials.puskesmas.modals.examination-detail')
@elseif (Request::segment(1) == "puskesmas" && Request::segment(2) == "patients")
@include('partials.puskesmas.modals.add-patient')
@endif