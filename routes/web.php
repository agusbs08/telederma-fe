<?php

Route::get('/', 'IndexController@index')->name('index');

/*
|--------------------------------------------------------------------------
| Puskesmas Route
|--------------------------------------------------------------------------
*/

Route::middleware(['role:clinic'])->group(function(){
    Route::prefix('puskesmas')->group(function () {
        Route::prefix('patients')->group(function(){
            Route::post('/', 'Clinic\PuskesmasPatientController@registerPatient')->name('clinic.registerPatient');
            Route::get('/', 'Clinic\PuskesmasPatientController@getPatientsListView')->name('puskesmas.patients');
            Route::get('{patient_username}/details', 'Clinic\PuskesmasPatientController@getPatientDetailsView')
                ->name('puskesmas.patient-details');
            Route::get('{patient_id}/examinations', 'Clinic\PuskesmasExaminationController@getPatientAddExaminationForm')->name('puskesmas.examination-form');
            Route::prefix('examinations')->group(function(){
                Route::post('/', 'Clinic\PuskesmasExaminationController@submitExamination')->name('puskesmas.submit-examination');
                Route::post('result', 'Clinic\PuskesmasExaminationController@submitExaminationResult')->name('puskesmas.submit-examination-result');
                Route::post('image', 'Clinic\PuskesmasExaminationController@submitExaminationImage')->name('puskesmas.submit-examination-image');
            });
        });
        Route::prefix('officers')->group(function(){
            Route::get('/', 'Clinic\PuskesmasOfficerController@getOfficersListView')->name('puskesmas.get-officers-list');
            Route::post('/', 'Clinic\PuskesmasOfficerController@registerOfficer')->name('puskesmas.register-officer');
        });
        Route::prefix('examinations')->group(function(){
            Route::get('/', 'Clinic\PuskesmasExaminationController@getClinicsExaminationsView')->name('puskesmas.get-examinations');
            Route::get('/{examination_id}', 'Clinic\PuskesmasExaminationController@getExaminationDetailsView')->name('puskesmas.get-examination-details');
        });
        Route::prefix('live-interactive')->group(function(){
            Route::get('/submission', 'Clinic\PuskesmasLiveInteractiveController@getSubmissionList')->name('puskesmas.get-live-interactive-subms-list');
            Route::get('/submission/{id}', 'Clinic\PuskesmasLiveInteractiveController@getSubmissionDetails')->name('puskesmas.get-live-interactive-subms-details');
            Route::post('/propose', 'Clinic\PuskesmasLiveInteractiveController@proposeLiveInteractive')->name('puskesmas.submit-live-interactive');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Doctor Route
|--------------------------------------------------------------------------
*/
Route::middleware(['role:doctor'])->group(function(){
    Route::prefix('doctor')->group(function(){
        Route::prefix('examinations')->group(function(){
            Route::get('/', 'Doctor\DoctorExaminationsController@getDoctorExaminationListView')->name('doctor.examinations');
            Route::get('{examination_id}', 'Doctor\DoctorExaminationsController@getDoctorExaminationDetailView')->name('doctor.examination-details');
        });
        Route::post('diagnose', 'Doctor\DoctorExaminationsController@postDiagnose')->name('doctor.post-diagnose');
        Route::prefix('live-interactive')->group(function(){
            Route::get('/submission', 'Doctor\DoctorLiveInteractiveController@getSubmissionList')->name('doctor.get-live-interactive-subms-list');
            Route::get('/submission/{id}', 'Doctor\DoctorLiveInteractiveController@getSubmissionDetails')->name('doctor.get-live-interactive-subms-details');
            Route::post('/submission/{id}/respond', 'Doctor\DoctorLiveInteractiveController@respondLiveInteractive')->name('doctor.respond-live-interactive-subms');
            Route::get('/submission/{subs_id}/respond/{resp_id}', 'Doctor\DoctorLiveInteractiveController@cancelResponse')->name('doctor.delete-respond-live-interactive-subms');
        });
        Route::get('live', 'Doctor\DoctorLiveInteractiveController@getLiveInteractive')->name('doctor.get-live-interactive');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Route
|--------------------------------------------------------------------------
*/

Route::middleware(['role:admin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('doctors', 'Admin\AdminDoctorController@getAdminDoctorListView')->name('admin.doctors');
        Route::get('doctors/{doctor_id}', 'Admin\AdminDoctorController@getAdminDoctorDetailView')->name('admin.doctor-details');
        Route::post('doctors', 'Admin\AdminDoctorController@submitDoctor')->name('admin.submit-doctors');
        Route::get('puskesmas', 'Admin\AdminPuskesmasController@getAdminPuskesmasListView')->name('admin.puskesmas');
        Route::post('puskesmas', 'Admin\AdminPuskesmasController@submitClinic')->name('admin.submit-clinic');
        Route::get('puskesmas/{puskesmas_id}', 'Admin\AdminPuskesmasController@getAdminPuskesmasDetailView')->name('admin.puskesmas-details');
        Route::get('hospitals', 'Admin\AdminHospitalController@getAdminHospitalListView')->name('admin.hospitals');
        Route::get('hospitals/{hospital_id}', 'Admin\AdminHospitalController@getAdminHospitalDetailView')->name('admin.hospital-details');
        Route::post('hospitals', 'Admin\AdminHospitalController@submitHospital')->name('admin.submit-hospital');
    });
});

/*
|--------------------------------------------------------------------------
| Account & Settings Route
|--------------------------------------------------------------------------
*/

Route::middleware(['role:admin,doctor,clinic'])->group(function(){
    Route::prefix('account')->group(function(){
        Route::prefix('settings')->group(function(){
            Route::get('general', 'Account\AccountController@getGeneralSettings')->name('account-settings');
            Route::post('general', 'Account\AccountController@updateAccount')->name('update-account-general');
            Route::post('profile-picture', 'Account\AccountController@updateProfilePicture')->name('update-account-profile-picture');
            Route::get('credentials', 'Account\AccountController@getCredentialSettings')->name('credential-settings');
            Route::post('credentials', 'Account\AccountController@updatePassword')->name('update-password');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Conversation Route
|--------------------------------------------------------------------------
*/

Route::get('/conversations', 'Conversation\ConversationController@getConversationListView')->name('conversation-list');
// Route::get('/send-message', 'Conversation\ConversationController@sendMessage')->name('send-message');


/*
|--------------------------------------------------------------------------
| Authentication Route
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function(){
    Route::prefix('login')->group(function(){
        Route::get('/', 'Auth\AuthController@getLoginView')->name('auth.getLoginView');
        Route::post('/', 'Auth\AuthController@login')->name('auth.login');
    });
    Route::get('/logout', 'Auth\AuthController@logout')->name('auth.logout');
});

//video call
Route::get('/videocall/doctor/{id}', function($id){
    return view('webrtc.video-call-doctor')->with(['id' => $id]);
});
Route::get('/videocall/patient/{id}', function($id){
    return view('webrtc.video-call-patient')->with(['id' => $id]);
});
Route::post('/pusher/auth/{id}/{name}', 'VideoCallController@callToUser')->name('pusher.callToUser');
