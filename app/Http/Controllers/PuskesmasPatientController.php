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
      $response = $client->request('GET', 'clinics/' . Session::get('username') . '/patients');
      return view('partials.puskesmas.patients.patients-list')
        ->with('pagename', 'puskesmas.get-patient-list-view')
        ->with('data', json_decode($response->getBody(), true));
    }

    // doing
    public function getPatientDetailsView($patient_code)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $patient_details = $client->request('GET', 'users/' . $patient_code);
      $patient_details = $client->request('GET', 'clinics/' . Session::get('username') . '/patients/' . $patient_code);
      $examinations = $client->request('GET', 'examinations/clinics/' . Session::get('username') . '/patients/' . $patient_code);
      return view('partials.puskesmas.patients.patient-detail')
        ->with('pagename', 'puskesmas.get-patient-details-view')
        ->with('user_details', json_decode($patient_details->getBody(), true))
        ->with('examinations_history', json_decode($examinations->getBody(), true));
    }

    public function getPatientAddExaminationForm(Request $request, $patient_username)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $doctors = $client->request('GET', 'users', [
        'query' => ['role' => 'doctor']
      ]);

      // $getDoctorResponse = json_decode($client->request('GET', 'users/doctor2')->getBody(), true);
      // $getPatientResponse = json_decode($client->request('GET', 'clinics/' . $clinicUsername . '/patients/' . $request->input('patientId'))->getBody(), true);
      // $getClinicResponse = json_decode($client->request('GET', 'users/' . $clinicUsername)->getBody(), true);

      return view('partials.puskesmas.patients.examination-form')
        ->with('pagename', 'puskesmas.examination-form')
        ->with('patientId', $patient_username)
        ->with('doctors', json_decode($doctors->getBody(), true));
    }

    public function submitExamination(Request $request)
    {
      $clinicUsername = Session::get('username');
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $getDoctorResponse = json_decode($client->request('GET', 'users/' . $request->input('doctorUsername'))->getBody(), true);
      $getPatientResponse = json_decode($client->request('GET', 'clinics/' . $clinicUsername . '/patients/' . $request->input('patientId'))->getBody(), true);
      $getClinicResponse = json_decode($client->request('GET', 'users/' . $clinicUsername)->getBody(), true);
      $submitExaminationResponse = $client->request('POST', 'examinations', [
        'form_params' => [
          'doctor' => [
            'name' => $getDoctorResponse['name'],
            'username' => $getDoctorResponse['username'],
            'hospital' => $getDoctorResponse['hospital']
          ],
          'patient' => [
            'name' => $getPatientResponse['name'],
            'code' => $getPatientResponse['_id']
          ],
          'clinic' => [
            'name' => $getClinicResponse['name'],
            'username' => $getClinicResponse['username'],
            'officer' => $getClinicResponse['officer']
          ],
          'images' => [],
          'type' => $request->input('type'),
          'results' => [
            'automatic' => $request->input('automatedDiagnoseResult'),
            'manual' => $request->input('description')
          ]
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
          'description' => $request->input('description'),
          'automatedDiagnoseResult' => $request->input('automatedDiagnoseResult')
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