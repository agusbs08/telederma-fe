<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use GuzzleHttp\Client;

class AdminPuskesmasController extends Controller
{
    public function getAdminPuskesmasListView()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $puskesmasResponse = $client->request('GET', 'puskesmas');
        $puskesmasResponse = $client->request('GET', 'users', [
            'query' => ['role' => 'clinic']
        ]);
        return view('partials.admin.puskesmas.puskesmas-list')
            ->with('pagename', 'admin.puskesmas-list-view')
            ->with('puskesmas', json_decode($puskesmasResponse->getBody(), true));
    }

    public function getAdminPuskesmasDetailView($puskesmas_username)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $puskesmasResponse = $client->request('GET', 'users/' . $puskesmas_username);
        return view('partials.admin.puskesmas.puskesmas-details')
            ->with('pagename', 'admin.puskesmas-details-view')
            ->with('puskesmas_detail', json_decode($puskesmasResponse->getBody(), true));
    }

    public function submitClinic(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'register', [
            'form_params' => [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'username' => $request->input('username'),
                'role' => 'clinic',
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'identityNumber' => $request->input('identityNumber'),
            ]
        ]);
    }
}
