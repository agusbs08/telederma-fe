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
                @if (session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 10px 5px;">
                    <button type="button" class="close" aria-label="Close"></button>
                    <strong>{{ session('errors') }}</strong>
                </div>
                @endif
                <div class="app-main__inner">
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/main.cba69814a806ecc7945a.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    @if ($pagename == 'puskesmas.examination-form')
    <script>
        let automatedDiagnoseResult = [];
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.13.3/dist/tf.min.js"></script>
    <script src="{{ asset('js/diagnoses-recommendation.js') }}"></script>
    <script>
        function submitExamination() {
            $.ajax({
                type: 'POST',
                url: "{{ route('puskesmas.submit-examination') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    doctorUsername: $('#doctor').val(),
                    type: 'store',
                    patientId: '{{ $patientId }}',
                    automatedDiagnoseResult: automatedDiagnoseResult,
                    description: $('#description').val(),
                    officer: 'Indriyani'
                },
                success: (res) => {
                    console.log(res)
                    let id = res.examination._id
                    let formData = new FormData()
                    $.each($("input[type='file']")[0].files, function(i, file) {
                        formData.append('images', file);
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ config('app.API_endpoint') }}" + 'examinations/' + id + "/images",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Authorization': "Bearer " + "{{ Session::get('auth-key') }}"
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: (data) => {
                            // console.log(data)
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
            })
        }
        // function submitExamination() {
        //     console.log(automatedDiagnoseResult)
        //     $.ajax({
        //         type: "POST",
        //         url: '{{ route("puskesmas.submit-examination") }}',
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         },
        //         data: {
        //             doctorId: $('#doctor').val(),
        //             hospitalId: 'rsua',
        //             patientId: '{{ $patientId }}'
        //         },
        //         success: (res) => {
        //             console.log("1")
        //             console.log(res)
        //             $.ajax({
        //                 type: "POST",
        //                 url: '{{ route("puskesmas.submit-examination-result") }}',
        //                 headers: {
        //                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                 },
        //                 data: {
        //                     examinationId: res.examinationId,
        //                     description: $('#description').val(),
        //                     automatedDiagnoseResult: automatedDiagnoseResult
        //                 },
        //                 success: (data) => {
        //                     console.log("2")
        //                     console.log(data)
        //                     let formData = new FormData()
        //                     formData.append('examinationId', data.examinationId)
        //                     formData.append('images', $('input[type=file]')[0].files[0])
        //                     $.ajax({
        //                         type: "POST",
        //                         url: '{{ route("puskesmas.submit-examination-image") }}',
        //                         headers: {
        //                             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                         },
        //                         data: formData,
        //                         processData: false,
        //                         contentType: false,
        //                         success: (data) => {
        //                             console.log(data)
        //                             console.log("3")
        //                             window.location = '/puskesmas/patients/{{$patientId}}/details'
        //                         },
        //                         error: (error) => {
        //                             console.log(error)
        //                         }
        //                     });
        //                 },
        //                 error: (error) => {
        //                     console.log(error)
        //                 }
        //             });
        //         },
        //         error: (error) => {
        //             console.log(error)
        //         }
        //     });
        // }
    </script>
    @endif
    @if($pagename == 'puskesmas.get-patient-list-view')
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
                    location.reload();
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
    </script>
    @endif
    @if ($pagename == 'get-doctor-examination-detail-view')
    <script>
        $('#add-recipe-form').click(() => {
            let fieldWrapper = $("<div class=\"position-relative row form-group\"></div>");
            let element = "<label class=\"col-sm-2 col-form-label\"></label>"
            element += "<div class=\"col-sm-10\">"
            element += "<div class=\"form-inline\">"
            element += "<div class=\"position-relative form-group\">"
            element += "<input name=\"medicine-name\" placeholder=\"nama obat\" type=\"text\" class=\"medicine-name mr-2 form-control\">"
            element += "</div>"
            element += "<div class=\"position-relative form-group \">"
            element += "<input name=\"usage-rule\" placeholder=\"aturan pakai\" type=\"text\" class=\"usage-rule mr-2 form-control\">"
            element += "</div>"
            element += "<div class=\"position-relative form-group \">"
            element += "<input name=\"recipe-desc\" placeholder=\"keterangan\" type=\"text\" class=\"recipe-desc mr-2 form-control\">"
            element += "<button class=\"btn btn-danger btn-remove-field\" type=\"button\">Hapus Resep</button></div></div></div>";
            $(document).on("click", ".btn-remove-field", function(){
                $(this).closest('.row').remove()
            });
            fieldWrapper.append($(element));
            $('#recipe-field').append(fieldWrapper);
        })
        function submitDiagnose(){
            let data = {}
            data.examinationId = '{{ $examination_id }}'
            data.desc = $('#description').val()
            data.diagnoseCost = $('#diagnose-cost').val()
            data.diseaseName = $('#disease-name').val()
            data.recipes = []
            let noRecipe = document.getElementsByName('medicine-name').length
            for(let i=0; i < noRecipe; i++){
                data.recipes.push({
                    'medicineName': document.getElementsByName('medicine-name')[i].value,
                    'usageRule': document.getElementsByName('usage-rule')[i].value,
                    'recipeDesc': document.getElementsByName('recipe-desc')[i].value,
                })
            }
            $.ajax({
                type: "POST",
                url: '{{ route("doctor.post-diagnose") }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: data,
                success: (res) => {
                    // console.log(res)
                    window.location = '//localhost:3000/doctor/examinations'
                },
                error: (error) => {
                    console.error(error)
                }
            });
        }
    </script>
    @endif
    @if ($pagename == 'puskesmas.get-patient-details-view')
    <script>
        $(document).ready(function(){
            $(".examinationDetailsModalBtn").click(function(){
                const examinationId = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "{{ config('app.API_endpoint') }}" + 'examinations/' + examinationId,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Authorization': "Bearer " + "{{ Session::get('auth-key') }}"
                    },
                    success: (res) => {
                        console.log(res)
                        $('.examination-desc').text(res.results.manual)
                        $('.examination-doctor-name').text(res.doctor.name)
                        $('.examination-officer-name').text(res.clinic.officer)
                        $('.examination-image-wrapper').empty()
                        res.images.microscopic.forEach(i => {
                            $('.examination-image-wrapper').prepend("<img style='width:100%;max-width:300px;margin:5px;' src='{{ config('app.server_url') }}" + i.url + "'/>")
                        });
                    },
                    error: (error) => {
                        console.error(error)
                    }
                });
            });
            $(".examinationResultModalBtn").click(function(){
                const examinationId = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "{{ config('app.API_endpoint') }}" + 'examinations/' + examinationId,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Authorization': "Bearer " + "{{ Session::get('auth-key') }}"
                    },
                    success: (res, textStatus, xhr) => {
                        $('.diagnoses-result-wrapper').show()
                        $('.examination-check-status-label').show()
                        if (xhr.status == 200 && !res.hasOwnProperty('diagnoses')) {
                            $('.diagnoses-result-wrapper').hide()
                        } else {
                            $('.examination-check-status-label').hide()
                            $('.disease-name').text(res.diseaseName)
                            $('.diagnoses-desc').text(res.desc)
                            $('.diagnose-doctor-name').text(res.doctorId)
                            $('.diagnose-cost').text("Rp. " + res.diagnoseCost)
                            $('.recipe-table > tbody:last-child').empty()
                            res.recipes.forEach((recipe, i) => {
                                const row = 
                                    "<tr>" + 
                                    "<th scope='row'>" + (parseInt(i)+parseInt(1)) + "</th>" +
                                    "<td>" + recipe.medicineName + "</td>" +
                                    "<td>" + recipe.usageRule + "</td>" +
                                    "<td>" + recipe.recipeDesc + "</td>" +
                                    "</tr>"
                                $('.recipe-table > tbody:last-child').append(row);
                            })
                        }                    
                    },
                    error: (xhr, ajaxOptions, thrownError) => {
                        console.log(xhr)
                    }
                });
            });
        });
    </script>
    @endif
    @if ($pagename == 'admin.doctors-list-view')
    <script>
        function openAddDoctorFormModal(){
            $.ajax({
                type: "GET",
                url: '{{ config('app.API_endpoint') }}hospitals',
                headers: {
                    'Authorization': 'Bearer {{ Session::get('auth-key') }}'
                },
                success: (res) => {
                    $('#hospital').empty()
                    $('#hospital').append('<option selected disabled>Pilih Rumah Sakit: </option>')
                    res.forEach(r => {
                        $("#hospital").append(new Option(r.name, r.name));
                    })
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
        function submitDoctor(){
            const data = {
                role: "doctor",
                identityNumber: $('#nik').val(),
                name: $('#name').val(),
                dob: $('#birth-date').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                confirmPassword: $('#confirm-password').val(),
                hospital: $('#hospital').val(),
                phone: $('#phone').val()
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.submit-doctors') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: data,
                success: () => {
                    location.reload();
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
    </script>
    @endif
    @if ($pagename == 'admin.puskesmas-list-view')
    <script>
        function submitPuskesmas(){
            const data = {
                role: "puskesmas",
                name: $('#name').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                confirmPassword: $('#confirm-password').val(),
                phone: $('#phone').val(),
                identityNumber: $('#identity-number').val()
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.submit-clinic') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: data,
                success: (res) => {
                    console.log(res)
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
@elseif (Request::segment(1) == "admin" && Request::segment(2) == "doctors")
@include('partials.admin.modals.add-doctor')
@elseif (Request::segment(1) == "admin" && Request::segment(2) == "puskesmas")
@include('partials.admin.modals.add-puskesmas')
@endif