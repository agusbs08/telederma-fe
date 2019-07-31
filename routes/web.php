<?php

Route::get('/', 'IndexController@index')->name('index');

/*
|--------------------------------------------------------------------------
| Puskesmas Route
|--------------------------------------------------------------------------
*/

Route::prefix('puskesmas')->group(function () {
    // Patients
    Route::get('patients', 'PuskesmasPatientController@getPatientsListView')->name('puskesmas.patients');
    Route::get('patients/{patient_username}/details', 'PuskesmasPatientController@getPatientDetailsView')
        ->name('puskesmas.patient-details');
    Route::get('patients/{patient_id}/examinations', 'PuskesmasPatientController@getPatientAddExaminationForm')->name('puskesmas.examination-form');
    Route::post('patients/examinations', 'PuskesmasPatientController@submitExamination')->name('puskesmas.submit-examination');
    Route::post('patients/examinations/result', 'PuskesmasPatientController@submitExaminationResult')->name('puskesmas.submit-examination-result');
    Route::post('patients/examinations/image', 'PuskesmasPatientController@submitExaminationImage')->name('puskesmas.submit-examination-image');
    // Examinations
    Route::get('examinations', 'PuskesmasExaminationController@getExaminationsListView')->name('puskesmas.examinations');
    Route::get('examinations/{examination_id}', function () {
        return view('partials.puskesmas.examinations.examination-details');
    })->name('puskesmas.examination-details');
    // Dashboards
    Route::get('dashboard', function () {
        return view('partials.puskesmas.patients-list');
    })->name('puskesmas.dashboard');
});

/*
|--------------------------------------------------------------------------
| Doctor Route
|--------------------------------------------------------------------------
*/

Route::prefix('doctor')->group(function(){
    Route::get('examinations', 'Doctor\DoctorExaminationsController@getDoctorExaminationListView')->name('doctor.examinations');
    Route::get('examinations/{examination_id}', 'Doctor\DoctorExaminationsController@getDoctorExaminationDetailView')->name('doctor.examination-details');
});

/*
|--------------------------------------------------------------------------
| Authentication Route
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function(){
    Route::prefix('login')->group(function(){
        Route::get('/', 'AuthController@getLoginView')->name('auth.getLoginView');
        Route::post('/', 'AuthController@login')->name('auth.login');
    });
    Route::post('/signup', 'AuthController@signUpPatient')->name('auth.signupPatient');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});