<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class DoctorExaminationsController extends Controller
{
    public function getDoctorExaminationListView()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/doctors/' . Session::get('username'));
        return view('partials.doctor.examinations.examinations-list')
            ->with('pagename', 'doctor-get-examination-list')
            ->with('examinations', json_decode($response->getBody(), true));
    }

    public function getDoctorExaminationDetailView($examination_id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $examinationDetailResponse = $client->request('GET', 'examinations/' . $examination_id);
        // dd(json_decode($examinationDetailResponse->getBody(), true));
        return view('partials.doctor.examinations.examination-details')
            ->with('pagename', 'get-doctor-examination-detail-view')
            ->with('examination_details', json_decode($examinationDetailResponse->getBody(), true));
    }
}
