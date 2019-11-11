<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasLiveInteractiveController extends Controller
{
    public function liveInteractive(Request $request)
    {
        return view('partials.puskesmas.live-interactives.main-live-interactive')
            ->with('pagename', 'puskesmas.main-live-interactive')
            ->with('pagetitle', 'Live');
    }


    public function getSubmissionList(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/live-interactive/submissions', [
            'query' => ['clinic' => Session::get('user-id')]
        ]);
        $filter = $request->query()['filter'];
        if ($filter == 'done'){
            $data = array_filter(json_decode($response->getBody(), true), function ($var) {
                return ($var['isLiveDone'] == true);
            });
        } else {
            $data = array_filter(json_decode($response->getBody(), true), function ($var) {
                return ($var['isLiveDone'] == false);
            });
        }
        return view('partials.puskesmas.live-interactives.live-interactive-subms-list')
            ->with('pagename', 'puskesmas.live-interactive-subms-list')
            ->with('pagetitle', 'Daftar Pengajuan Live')
            ->with('filter', $filter)
            ->with('data', $data);
    }

    public function proposeLiveInteractive(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'examinations/live-interactive/submissions', [
            'form_params' => [
                'patient' => [
                    'id' => $request->input('patient-id'),
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
            ->with('pagetitle', 'Detail Pengajuan')
            ->with('data', json_decode($response->getBody(), true))
            ->with('pagename', 'puskesmas.live-interactive-subms-details');
    }
}
