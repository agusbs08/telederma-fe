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
    <script type="text/javascript" src="{{ asset('js/main.cba69814a806ecc7945a.js') }}"></script>
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
                    console.log(res)
                    window.location = '//localhost:3000/doctor/examinations'
                },
                error: (error) => {
                    console.error(error)
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