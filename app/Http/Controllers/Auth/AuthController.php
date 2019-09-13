<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function getLoginView()
    {
      return view('pages.login')->with('pagename', 'login');
    }

    public function login(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key', 'default')];
      $client = new Client($guzzle_params);
      $loginResponse = $client->request('POST', 'login', [
        'form_params' => [
          'username' => $request->input('username'),
          'password' => $request->input('password')
        ]
      ]);
      if ($loginResponse->getStatusCode() == 200){
        $token = json_decode($loginResponse->getBody(), true)['token'];
        $userDetails = $this->setLoginSession($request->input('username'), $token);
        if ($userDetails['role'] == 'clinic')
          return route('puskesmas.patients', [], false);
        elseif ($userDetails['role'] == 'doctor')
          return route('doctor.examinations', [], false);
        elseif ($userDetails['role'] == 'admin')
          return route('admin.doctors', [], false);
      } else {
        return response()->json(['msg' => json_decode($loginResponse->getBody(), true)["error"]]);
      }
    }

    function setLoginSession($username, $token)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . $token];
      $client = new Client($guzzle_params);
      $getUserDetailResponse = $client->request('GET', 'users/' . $username);
      $userDetails = json_decode($getUserDetailResponse->getBody(), true);
      $userData = [
        'name' => $userDetails['name'],
        'auth-key' => $token,
        'authenticated' => "true",
        'username' => $userDetails['username'],
        'role' => $userDetails['role']
      ];
      if ($userDetails['role'] == 'doctor') {
        $userData['hospital'] = $userDetails['hospital'];
      }
      session($userData);
      return $userDetails;
    }

    public function logout(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key')];
      $client = new Client($guzzle_params);
      $response = $client->request('POST', 'users/me/logoutall');
      Session::flush();
      return redirect()->route('auth.getLoginView');
    }
}

?>
