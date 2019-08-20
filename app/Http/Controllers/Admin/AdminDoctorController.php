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
        $doctorResponse = $client->request('GET', 'users', [
            'query' => ['role' => 'doctor']
        ]);
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
        return view('partials.admin.doctor.doctor-details')
            ->with('pagename', 'admin.doctor-details-view')
            ->with('doctor_detail', json_decode($doctorResponse->getBody(), true));
    }

    public function submitDoctor(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'register', [
            'form_params' => [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'username' => $request->input('username'),
                'role' => 'doctor',
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'identityNumber' => $request->input('identityNumber'),
                'dob' => $request->input('dob'),
                'hospital' => $request->input('hospital')
            ]
        ]);
    }
}
