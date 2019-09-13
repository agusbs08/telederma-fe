<?php

namespace App\Http\Controllers\Clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;

class PuskesmasOfficerController extends Controller
{
    public function getOfficersListView()
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('GET', 'clinics/officers');
      return view('partials.puskesmas.officers.officers-list')
        ->with('pagename', 'puskesmas.get-officers-list-view')
        ->with('data', json_decode($response->getBody(), true));
    }

    public function registerOfficer(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('POST', 'clinics/officers', [
        'form_params' => [
          'identityNumber' => $request->input('nik'),
          'name' => $request->input('name'),
          'dob' => $request->input('birth-date'),
          'gender' => $request->input('gender'),
        ]
      ]);
      return redirect()->route('puskesmas.get-officers-list');
    }
}
