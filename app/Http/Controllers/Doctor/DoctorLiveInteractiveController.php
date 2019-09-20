<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class DoctorLiveInteractiveController extends Controller
{
    public function getLiveInteractive()
    {
        return view('partials.doctor.live-interactive.live-interactive')
            ->with('pagename', 'get-doctor-live-interactive-view');
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
            ->with('pagename', 'puskesmas.live-interactive-subms-list')
            ->with('data', json_decode($response->getBody(), true));
    }

    public function getSubmissionDetails(Request $request, $id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'examinations/live-interactive/submissions/' . $id);
        return view('partials.doctor.live-interactive.live-interactive-subms-details')
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
        // dd([$subs_id, $resp_id]);
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('DELETE', 'examinations/live-interactive/submissions/' . $subs_id. '/responses/' . $resp_id);
        return redirect()->back();
    }
}
