<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use GuzzleHttp\Client;

class AdminDoctorController extends Controller
{
    public function getAdminDoctorListView()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $doctorResponse = $client->request('GET', 'doctors');
        return view('partials.admin.doctor.doctors-list')
            ->with('pagename', 'admin.doctors-list-view')
            ->with('doctors', json_decode($doctorResponse->getBody(), true));
    }

    public function getAdminDoctorDetailView($doctor_username)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $doctorResponse = $client->request('GET', 'users/' . $doctor_username);
        // dd(json_decode($doctorResponse->getBody(), true));
        return view('partials.admin.doctor.doctor-details')
            ->with('pagename', 'admin.doctor-details-view')
            ->with('doctor_detail', json_decode($doctorResponse->getBody(), true));
    }
}
