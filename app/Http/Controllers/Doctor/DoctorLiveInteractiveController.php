<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class DoctorLiveInteractiveController extends Controller
{
    public function getLiveInteractive(Request $request)
    {
        // dd($request->query());
        return view('partials.doctor.live-interactive.live-interactive')
            ->with('data', $request->query())
            ->with('pagetitle', 'Live Interactive')
            ->with('pagename', 'get-doctor-live-interactive-view');
    }

    public function submitLiveExamination(Request $request)
    {
        $clinicId = $request->input('clinicId');
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $getPatientResponse = json_decode($client->request('GET', 'clinics/' . $clinicId . '/patients/' . $request->input('patientId'))->getBody(), true);
        $getClinicResponse = json_decode($client->request('GET', 'users/clinic/' . $clinicId)->getBody(), true);
        $recipes = array();
        foreach($request->input('recipes') as $recipe)
        {
            array_push($recipes, [
                'medicine' => $recipe['medicineName'],
                'usage' => $recipe['usageRule'],
                'description' => $recipe['recipeDesc'],
                ]);
        }
        $data = [
            'form_params' => [
                'doctor' => [
                    'hospital' => $request->input('hospital'),
                    'name' => Session::get('name')
                ],
                'patient' => [
                    'name' => $getPatientResponse['name'],
                    'id' => $getPatientResponse['_id']
                ],
                'clinic' => [
                    'name' => $getClinicResponse['name'],
                    'userId' => $getClinicResponse['_id'],
                    'officer' => $request->input('officer')
                ],
                'type' => $request->input('type'),
                'results' => [
                    'automatic' => $request->input('automatedDiagnoseResult'),
                    'manual' => $request->input('description')
                ],
                'diagnoses' => [
                    'description' => $request->input('desc'),
                    'cost' => $request->input('diagnoseCost'),
                    'disease' => $request->input('diseaseName'),
                    'recipes' => $recipes
                ]
            ]
        ];
        $submitExaminationResponse = $client->request('POST', 'examinations/live-interactive/live-diagnose', $data);
        return json_decode($submitExaminationResponse->getBody(), true);
    }


    public function getSubmissionList()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/live-interactive/submissions', [
            'query' => ['hospital' => Session::get('hospital')]
        ]);
        return view('partials.doctor.live-interactive.live-interactive-subms-list')
            ->with('pagetitle', 'Daftar Pengajuan Live')
            ->with('pagename', 'puskesmas.live-interactive-subms-list')
            ->with('data', json_decode($response->getBody(), true));
    }

    public function getSubmissionDetails(Request $request, $id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/live-interactive/submissions/' . $id);
        // dd(json_decode($response->getBody(), true));
        return view('partials.doctor.live-interactive.live-interactive-subms-details')
            ->with('pagetitle', 'Detail Pengajuan Live')
            ->with('data', json_decode($response->getBody(), true))
            ->with('pagename', 'puskesmas.live-interactive-subms-details');
    }

    public function respondLiveInteractive(Request $request, $id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'examinations/live-interactive/submissions/' . $id . '/comments', [
            'form_params' => [
                "comment" => $request->input('response')
            ]
        ]);
        return redirect()->back();
    }

    public function cancelResponse(Request $request, $subs_id, $resp_id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('DELETE', 'examinations/live-interactive/submissions/' . $subs_id. '/responses/' . $resp_id);
        return redirect()->back();
    }
}
