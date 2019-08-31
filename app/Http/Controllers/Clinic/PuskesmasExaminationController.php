<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasExaminationController extends Controller
{
    public function getExaminationDetailsView(Request $request, $examination_id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $examinationDetailResponse = $client->request('GET', 'examinations/' . $examination_id);
        return view('partials.puskesmas.examinations.examination-details')
            ->with('pagename', 'get-clinic-examination-detail-view')
            ->with('examination_id', $examination_id)
            ->with('examination_details', json_decode($examinationDetailResponse->getBody(), true));
    }

    public function getPatientAddExaminationForm(Request $request, $patient_username)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $hospitals = $client->request('GET', 'hospitals');
      $officers = $client->request('GET', 'clinics/officers');
      return view('partials.puskesmas.patients.examination-form')
        ->with('pagename', 'puskesmas.examination-form')
        ->with('patientId', $patient_username)
        ->with('hospitals', json_decode($hospitals->getBody(), true))
        ->with('officers', json_decode($officers->getBody(), true));
    }

    public function submitExamination(Request $request)
    {
      $clinicUsername = Session::get('username');
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $getPatientResponse = json_decode($client->request('GET', 'clinics/' . $clinicUsername . '/patients/' . $request->input('patientId'))->getBody(), true);
      $getClinicResponse = json_decode($client->request('GET', 'users/' . $clinicUsername)->getBody(), true);
      $submitExaminationResponse = $client->request('POST', 'examinations', [
        'form_params' => [
          'doctor' => [
            'hospital' => $request->input('hospital')
          ],
          'patient' => [
            'name' => $getPatientResponse['name'],
            'code' => $getPatientResponse['_id']
          ],
          'clinic' => [
            'name' => $getClinicResponse['name'],
            'username' => $getClinicResponse['username'],
            'officer' => $request->input('officer')
          ],
          'type' => $request->input('type'),
          'results' => [
            'automatic' => $request->input('automatedDiagnoseResult'),
            'manual' => $request->input('description')
          ]
        ]
      ]);
      return json_decode($submitExaminationResponse->getBody(), true);
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
