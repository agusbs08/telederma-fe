<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Puskesmas Route
|--------------------------------------------------------------------------
*/

// Patients

Route::get('/puskesmas/patients', 'PuskesmasPatientController@getPatients')->name('puskesmas.patients');

Route::get('/puskesmas/patients/{patient_id}/details', function () {
    return view('partials.puskesmas.patients.patient-detail');
})->name('puskesmas.patient-details');

Route::get('/puskesmas/patients/{patient_id}/examinations', function () {
    return view('partials.puskesmas.patients.examination-form');
})->name('puskesmas.examination-form');

// Examinations

Route::get('/puskesmas/examinations', function () {
    return view('partials.puskesmas.examinations.examinations-list');
})->name('puskesmas.examinations');

Route::get('/puskesmas/examinations/{examination_id}', function () {
    return view('partials.puskesmas.examinations.examination-details');
})->name('puskesmas.examination-details');

// Dashboards

Route::get('/puskesmas/dashboard', function () {
    return view('partials.puskesmas.patients-list');
})->name('puskesmas.dashboard');

/*
|--------------------------------------------------------------------------
| Doctor Route
|--------------------------------------------------------------------------
*/

Route::get('/doctor/examinations', function () {
    return view('partials.doctor.examinations.examinations-list');
})->name('doctor.examinations');

Route::get('/doctor/examinations/{examination_id}', function () {
    return view('partials.doctor.examinations.examination-details');
})->name('doctor.examination-details');

/*
|--------------------------------------------------------------------------
| Authentication Route
|--------------------------------------------------------------------------
*/

Route::get('/auth/login', 'LoginController@getLoginView')->name('auth.getLoginView');
Route::post('/auth/login', 'LoginController@login')->name('auth.login');