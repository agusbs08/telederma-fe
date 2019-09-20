<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasLiveInteractiveController extends Controller
{
    public function getSubmissionList()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/live-interactive/submissions');
        return view('partials.puskesmas.live-interactives.live-interactive-subms-list')
            ->with('pagename', 'puskesmas.live-interactive-subms-list')
            ->with('data', json_decode($response->getBody(), true));
    }

    public function proposeLiveInteractive(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'examinations/live-interactive/submissions', [
            'form_params' => [
                'patient' => [
                    'email' => $request->input('patient-email'),
                    'nik' => $request->input('patient-nik'),
                    'name' => $request->input('patient-name'),
                    'dob' => $request->input('patient-dob')
                ],
                'clinic' => [
                    'officer' => $request->input('officer')
                ],
                'hospital' => $request->input('hospital')
            ]
        ]);
        return redirect()
            ->route('puskesmas.get-live-interactive-subms-details', ['id' => json_decode($response->getBody(), true)['_id']]);
    }

    public function getSubmissionDetails(Request $request, $id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/live-interactive/submissions/' . $id);
        return view('partials.puskesmas.live-interactives.live-interactive-subms-details')
        ->with('data', json_decode($response->getBody(), true))
        ->with('pagename', 'puskesmas.live-interactive-subms-details');
    }
}
