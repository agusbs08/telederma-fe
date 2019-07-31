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
    Route::get('patients/{patient_id}/details', function () {
        return view('partials.puskesmas.patients.patient-detail');
    })->name('puskesmas.patient-details');
    Route::get('patients/{patient_id}/examinations', function () {
        return view('partials.puskesmas.patients.examination-form');
    })->name('puskesmas.examination-form');
    // Examinations
    Route::get('examinations', function () {
        return view('partials.puskesmas.examinations.examinations-list');
    })->name('puskesmas.examinations');
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

Route::prefix('doctor', function(){
    Route::get('examinations', function () {
        return view('partials.doctor.examinations.examinations-list');
    })->name('doctor.examinations');
    Route::get('examinations/{examination_id}', function () {
        return view('partials.doctor.examinations.examination-details');
    })->name('doctor.examination-details');
});

/*
|--------------------------------------------------------------------------
| Authentication Route
|--------------------------------------------------------------------------
*/

// Route::prefix('auth')->group(function(){
//     Route::prefix('login')->group(function(){
//         Route::get('/', 'LoginController@getLoginView')->name('auth.getLoginView');
//         Route::post('/', 'LoginController@login')->name('auth.login');
//     });
// });

Route::get('/lala/{id}', function($id){
    return view('webrtc.video-call')->with(['id' => $id]);
});

Route::post('/pusher/auth/{id}', 'VideoCallController@callToUser')->name('pusher.callToUser');