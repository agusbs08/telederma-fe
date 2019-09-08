<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use GuzzleHttp\Client;

class AccountController extends Controller
{
    public function getAccountDetail()
    {}

    public function getGeneralSettings()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'users/' . Session::get('username'));
        $userData = json_decode($response->getBody(), true);
        return view('partials.account.setting')
            ->with('pagename', 'account-setting')
            ->with('user_data', json_decode($response->getBody(), true));

    }

    public function updateAccount(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'users/settings/general', [
            'form_params' => [
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'identityNumber' => $request->input('identity-number'),
            ]
        ]);
        if ($response->getStatusCode() == 200){
            session([
                'name' => $request->input('name'), 
                'username' => $request->input('username')]
            );
            return redirect()->route('account-settings')->with('general-info-update-success', 'Profil berhasil diupdate!');
        }
    }

    public function updateProfilePicture(Request $request)
    {
        $file = $request->file('profile-picture');
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $guzzle_params['multipart'] = [
            [
                'name'     => 'image',
                'contents' => file_get_contents($file->getRealPath()),
                'filename' => $file->getClientOriginalName()
            ],
        ];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'users/settings/profile-picture');
        if ($response->getStatusCode() == 200){
            return redirect()->route('account-settings')->with('prof-pic-update-success', 'Foto profil berhasil diupdate!');
        }
    }
}
