<?php

namespace App\Http\Controllers;

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
      $loginResponseCode = $loginResponse->getStatusCode();
      if ($loginResponseCode == 200){
        $getUserDetailResponse = $client->request('GET', 'users/' . $request->input('username'));
        $userDetails = json_decode($getUserDetailResponse->getBody(), true);
        session([
          'auth-key' => json_decode($loginResponse->getBody(), true)['token'],
          'authenticated' => "true",
          'username' => $userDetails['username'],
          'role' => $userDetails['role']
        ]);
        if ($userDetails['role'] == 'PUSKESMAS')
          return route('puskesmas.patients', [], false);
        elseif ($userDetails['role'] == 'DOCTOR')
          return route('doctor.examinations', [], false);
      } elseif ($loginResponseCode == 400) {
        return response()->json(['msg' => 'wrong password']);
      } elseif ($loginResponseCode == 404) {
        return response()->json(['msg' => 'user not found']);
      } else {
        return response()->json(['msg' => 'something went wrong']);
      }
    }

    public function logout(Request $request)
    {
      $request->session()->flush();
      header('Location: http://localhost:3000/auth/login');
      exit();
    }
}

?>