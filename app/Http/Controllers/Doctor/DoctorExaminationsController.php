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
        // dd(json_decode($response->getBody(), true));
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
        $diagnoseResponse = $client->request('GET', 'examinations/' . $examination_id . '/diagnoses');
        // dd(json_decode($examinationDetailResponse->getBody(), true));
        return view('partials.doctor.examinations.examination-details')
            ->with('pagename', 'get-doctor-examination-detail-view')
            ->with('examination_id', $examination_id)
            ->with('diagnoses', json_decode($diagnoseResponse->getBody(), true))
            ->with('examination_details', json_decode($examinationDetailResponse->getBody(), true));
    }

    public function postDiagnose(Request $request){

        $data = array();
        $data['doctorId'] = Session::get('username');
        $data['examinationId'] = $request->input('examinationId');
        $data['desc'] = $request->input('desc');
        $data['diagnoseCost'] = $request->input('diagnoseCost');
        $data['diseaseName'] = $request->input('diseaseName');
        $data['recipes'] = array();
        foreach($request->input('recipes') as $recipe)
        {
            array_push($data['recipes'], [
                'medicineName' => $recipe['medicineName'],
                'usageRule' => $recipe['usageRule'],
                'recipeDesc' => $recipe['recipeDesc'],
            ]);
        }
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key', 'default')];
        $client = new Client($guzzle_params);
        $loginResponse = $client->request('POST', 'diagnoses', [ 'form_params' => $data ]);
        return json_decode($loginResponse->getBody(), true);
    }
}
