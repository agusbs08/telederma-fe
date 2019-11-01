<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use GuzzleHttp\Client;

class AccountController extends Controller
{
    public function getGeneralSettings()
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('GET', 'users/' . Session::get('role') . '/' . Session::get('user-id'));
        $userData = json_decode($response->getBody(), true);
        return view('partials.account.general-setting')
            ->with('pagetitle', 'Pengaturan Umum')
            ->with('pagename', 'general-setting')
            ->with('user_data', json_decode($response->getBody(), true));
    }

    public function getCredentialSettings()
    {
        return view('partials.account.credential-setting')
            ->with('pagetitle', 'Pengaturan Keamanan')
            ->with('pagename', 'credential-setting');
    }

    public function updateAccount(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'users/settings/general', [
            'form_params' => [
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'identityNumber' => $request->input('identity-number'),
            ]
        ]);
        if ($response->getStatusCode() == 200){
            session([
                'name' => $request->input('name')]
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
        $request->session()->put('profile-picture', json_decode($response->getBody(), true)["path"]);
        if ($response->getStatusCode() == 200){
            return redirect()->route('account-settings')->with('prof-pic-update-success', 'Foto profil berhasil diupdate!');
        }
    }

    public function updatePassword(Request $request)
    {
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
        $client = new Client($guzzle_params);
        $response = $client->request('POST', 'users/settings/password', [
            'form_params' => [
                'currentPassword' => $request->input('current-password'),
                'newPassword' => $request->input('new-password'),
                'reNewPassword' => $request->input('re-new-password'),
            ]
        ]);
        if ($response->getStatusCode() == 200){
            return redirect()->route('credential-settings')->with('password-update-success', 'Password diupdate');
        } else {
            return redirect()->route('credential-settings')->with('password-update-failed', (json_decode($response->getBody(), true))['msg']);
        }
    }
}
