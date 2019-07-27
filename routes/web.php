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

Route::get('/puskesmas/patients', function () {
    return view('partials.puskesmas.patients-list');
})->name('puskesmas.patients');

Route::get('/puskesmas/patients/{patient_id}/details', function () {
    return view('partials.puskesmas.patient-detail');
})->name('puskesmas.patient-details');

Route::get('/puskesmas/examinations', function () {
    return view('partials.puskesmas.examinations-list');
})->name('puskesmas.examinations');

Route::get('/puskesmas/dashboard', function () {
    return view('partials.puskesmas.patients-list');
})->name('puskesmas.dashboard');
