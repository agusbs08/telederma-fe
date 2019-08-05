<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasPatientController extends Controller
{
    public function getPatientsListView()
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('GET', 'puskesmas/' . Session::get('username'));
      return view('partials.puskesmas.patients.patients-list')
        ->with('pagename', 'puskesmas.get-patient-list-view')
        ->with('data', json_decode($response->getBody(), true));
    }

    public function getPatientDetailsView($patient_username)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $user_details = $client->request('GET', 'users/' . $patient_username);
      $examinations = $client->request('GET', 'examinations/puskesmass/' . Session::get('username') . '/patients/' . $patient_username);
      // dd(json_decode($examinations->getBody(), true));
      return view('partials.puskesmas.patients.patient-detail')
        ->with('pagename', 'puskesmas.get-patient-details-view')
        ->with('user_details', json_decode($user_details->getBody(), true))
        ->with('examinations_history', json_decode($examinations->getBody(), true));
    }

    public function getPatientAddExaminationForm($patient_username)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $doctors = $client->request('GET', 'doctors');
      return view('partials.puskesmas.patients.examination-form')
        ->with('pagename', 'puskesmas.examination-form')
        ->with('patientId', $patient_username)
        ->with('doctors', json_decode($doctors->getBody(), true));
    }

    public function submitExamination(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('POST', 'examinations', [
        'form_params' => [
          'doctorId' => $request->input('doctorId'),
          'hospitalId' => $request->input('hospitalId'),
          'patientId' => $request->input('patientId')
        ]
      ]);
      return json_decode($response->getBody(), true);
    }

    public function submitExaminationResult(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('POST', 'examinations/' . $request->input('examinationId') . '/results', [
        'form_params' => [
          'description' => $request->input('description')
        ]
      ]);
      return json_decode($response->getBody(), true);
    }

    public function submitExaminationImage(Request $request)
    {
      $file = $request->file('image');
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $guzzle_params['multipart'] = [
        [
          'name'     => 'image',
          'contents' => file_get_contents($file->getRealPath()),
          'filename' => $file->getClientOriginalName()
        ],
      ];
      $client = new Client($guzzle_params);
      $response = $client->request('POST', 'examinations/' . $request->input('examinationId') . '/images');
      return json_decode($response->getBody(), true);
    }
}

?>