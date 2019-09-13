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
        // dd(json_decode($response->getBody(), true));
        return view('partials.puskesmas.live-interactives.live-interactive-subms-list')
            ->with('pagename', 'puskesmas.live-interactive-subms-list')
            ->with('data', json_decode($response->getBody(), true));
    }

    public function proposeLiveInteractive(Request $request)
    {
      return view('partials.puskesmas.examinations.submit-live-interactive')
        ->with('pagename', 'puskesmas.propose-live-interactive');
    }
}
