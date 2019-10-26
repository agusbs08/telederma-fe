<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasPatientController extends Controller
{
    public function registerPatient(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $submitPatientResponse = $client->request('POST', 'clinics/' . Session::get('user-id') . '/patients', [
        'form_params' => [
          'phone' => $request->input('phone'),
          'name' => $request->input('name'),
          'dob' => $request->input('dob'),
          'nik' => $request->input('nik'),
          'address' => $request->input('address')
        ]
      ]);
      return json_decode($submitPatientResponse->getBody(), true);
    }

    public function getPatientsListView()
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('GET', 'clinics/' . Session::get('user-id') . '/patients');
      // dd(json_decode($response->getBody(), true));
      return view('partials.puskesmas.patients.patients-list')
        ->with('pagename', 'puskesmas.get-patient-list-view')
        ->with('pagetitle', 'Daftar Pasien')
        ->with('data', json_decode($response->getBody(), true));
    }

    public function getPatientDetailsView($patient_code)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $patient_details = $client->request('GET', 'clinics/' . Session::get('user-id') . '/patients/' . $patient_code);
      $examinations = $client->request('GET', 'examinations/clinics/' . Session::get('user-id') . '/patients/' . $patient_code);
      $hospitals = $client->request('GET', 'hospitals');
      $officers = $client->request('GET', 'clinics/officers');
      return view('partials.puskesmas.patients.patient-detail')
        ->with('hospitals', json_decode($hospitals->getBody(), true))
        ->with('officers', json_decode($officers->getBody(), true))
        ->with('user_details', json_decode($patient_details->getBody(), true))
        ->with('examinations_history', json_decode($examinations->getBody(), true))
        ->with('pagetitle', 'Detail Pasien')
        ->with('pagename', 'puskesmas.get-patient-details-view');
    }

}
