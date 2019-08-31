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
        });
        Route::prefix('examinations')->group(function(){
            Route::get('/{examination_id}', 'Clinic\PuskesmasExaminationController@getExaminationDetailsView')->name('puskesmas.get-examination-details');
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
    });
});

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
