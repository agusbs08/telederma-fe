<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class DoctorExaminationsController extends Controller
{
    public function getLiveInteractive()
    {
        return view('partials.doctor.live-interactive.live-interactive')
            ->with('pagename', 'get-doctor-live-interactive-view');
    }

    public function getDoctorExaminationListView()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/', [
            'query' => ['hospital' => Session::get('hospital')]
        ]);
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
        return view('partials.doctor.examinations.examination-details')
            ->with('pagename', 'get-doctor-examination-detail-view')
            ->with('examination_id', $examination_id)
            ->with('examination_details', json_decode($examinationDetailResponse->getBody(), true));
    }

    public function postDiagnose(Request $request)
    {
        $data = array();
        $data['description'] = $request->input('desc');
        $data['cost'] = $request->input('diagnoseCost');
        $data['disease'] = $request->input('diseaseName');
        $data['recipes'] = array();
        foreach($request->input('recipes') as $recipe)
        {
            array_push($data['recipes'], [
                'medicine' => $recipe['medicineName'],
                'usage' => $recipe['usageRule'],
                'description' => $recipe['recipeDesc'],
                ]);
        }
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key', 'default')];
        $client = new Client($guzzle_params);
        // $response = $client->request('POST', 'examinations/' . $request->input('examinationId') . '/images');
        $response = $client->request('POST', 'examinations/' . $request->input('examinationId') . '/diagnoses', [ 'form_params' => $data ]);
        return json_decode($response->getBody(), true);
    }
}
