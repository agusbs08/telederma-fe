@if ($pagename == 'general-setting')
<script>
    function toggleInput(){
            $('.setting-input, .submit-btn').prop('disabled', function(i, v) { return !v; });
        }
        function profilePictureInput(){
            event.preventDefault();
            $('#profile-pic-upload').click()
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.profile-picture-box').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#profile-pic-upload').change(function(){
            readURL(this)
            $('#save-profile-pic').show()
        })
        $('#account-setting').submit(function(event){
            if(!confirm("Simpan data baru?")){
                event.preventDefault();
            }
        });
        $('#profile-pic-setting').submit(function(event){
            if(!confirm("Simpan foto profil baru?")){
                event.preventDefault();
            }
        })
</script>
@endif
@if ($pagename == 'credential-setting')
<script>
    $('#credential-setting').submit(function(event){
            if(!confirm("Apakah Anda yakin?")){
                event.preventDefault();
            }
        });
</script>
@endif
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
                    hospital: $('#hospital').val(),
                    type: 'Store and Forward',
                    patientId: '{{ $patientId }}',
                    automatedDiagnoseResult: automatedDiagnoseResult,
                    description: $('#description').val(),
                    officer: $('#officer').val(),
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
</script>
@endif
@if($pagename == 'puskesmas.get-patient-list-view')
<script>
    function submitPatient(){
            const data = {
                phone: $('#phone').val(),
                name: $('#name').val(),
                dob: $('#birth-date').val(),
                nik: $('#nik').val(),
                address: $('#address').val()
            }
            $.ajax({
                type: "POST",
                url: "{{ route('clinic.registerPatient') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
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
@if ($pagename == 'get-doctor-live-interactive-view')
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/video-call-doctor.js') }}"></script>
@endif
@if ($pagename == 'get-doctor-examination-detail-view')
<script>
    $('#add-recipe-form').click(() => {
            let fieldWrapper = $("<div class=\"position-relative row form-group\"></div>");
            let element = "<label class=\"col-sm-2 col-form-label\"></label>"
            element += "<div class=\"col-sm-10\">"
            element += "<div class=\"form-row\">"
            element += "<div class=\"col-md-4 position-relative form-group\">"
            element += "<input name=\"medicine-name\" placeholder=\"nama obat\" type=\"text\" class=\"medicine-name mr-2 form-control\">"
            element += "</div>"
            element += "<div class=\"col-md-2 position-relative form-group \">"
            element += "<input name=\"usage-rule\" placeholder=\"aturan pakai\" type=\"text\" class=\"usage-rule mr-2 form-control\">"
            element += "</div>"
            element += "<div class=\"col-md-4 position-relative form-group \">"
            element += "<input name=\"recipe-desc\" placeholder=\"keterangan\" type=\"text\" class=\"recipe-desc mr-2 form-control\">"
            element += "</div>"
            element += "<div class=\"col-md-2 position-relative form-group \">"
            element += "<button class=\"btn btn-danger btn-block btn-remove-field\" type=\"button\">Hapus Resep</button></div></div></div>";
            element += "</div></div></div></div>"
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
                    window.location = '//localhost:8000/doctor/examinations'
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
</script>
@endif
@if ($pagename == 'admin.hospitals-list-view')
<script>
    function submitHospital(){
            const data = {
                phone: $('#phone').val(),
                name: $('#name').val(),
                address: $('#address').val(),
                about: $('#about').val(),
                website: $('#website').val(),
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.submit-hospital') }}",
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
@if ($pagename == 'admin.doctors-list-view')
<script>
    function openAddDoctorFormModal(){
        $.ajax({
            type: "GET",
            url: '{{ config('app.API_endpoint') }}' + 'hospitals',
            headers: {
                'Authorization': 'Bearer {{ Session::get('auth-key') }}'
            },
            success: (res) => {
                $('#hospital').empty()
                res.forEach(r => {
                    $("#hospital").append(new Option(r.name, r._id));
                })
            },
            error: (error) => {
                console.log(error)
            }
        });
    }
    function submitDoctor(){
        event.preventDefault()
        $.ajax({
            type: "POST",
            url: "{{ config('app.API_endpoint') }}" + 'users/check',
            data: {"email": $('#email').val()},
            success: (response) => {
                console.log(response)
                if (parseInt(response.count) >= 1){
                    $('#sub-msg').show().text("Email sudah digunakan")
                    console.log("used-in") 
                } else {
                    console.log("email unregistered")
                    document.getElementById("registerControlForm").submit()
                }
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