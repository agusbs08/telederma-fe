<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use GuzzleHttp\Client;

class AdminHospitalController extends Controller
{
    public function getAdminHospitalListView()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $hospitalResponse = $client->request('GET', 'hospitals');
        return view('partials.admin.hospital.hospitals-list')
            ->with('pagename', 'admin.hospitals-list-view')
            ->with('hospitals', json_decode($hospitalResponse->getBody(), true));
    }

    public function getAdminHospitalDetailView(Request $request, $hospital_id)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $hospitalResponse = $client->request('GET', 'hospitals/' . $hospital_id);
        $doctorResponse = $client->request('GET', 'users', [
            'query' => [
                'role' => 'doctor',
                'hospital' => json_decode($hospitalResponse->getBody(), true)['name']
            ]
        ]);
        return view('partials.admin.hospital.hospital-details')
            ->with('pagename', 'admin.hospital-details-view')
            ->with('hospital_detail', json_decode($hospitalResponse->getBody(), true))
            ->with('doctors', json_decode($doctorResponse->getBody(), true));
    }
}
