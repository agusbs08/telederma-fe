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
      $token = json_decode($loginResponse->getBody(), true)['token'];
      $loginResponseCode = $loginResponse->getStatusCode();
      if ($loginResponseCode == 200){
        $guzzle_params = config('app.guzzle_params');
        $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . $token];
        $client = new Client($guzzle_params);
        $getUserDetailResponse = $client->request('GET', 'users/' . $request->input('username'));
        $userDetails = json_decode($getUserDetailResponse->getBody(), true);
        session([
          'name' => $userDetails['name'],
          'auth-key' => $token,
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

    public function signUpPatient(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $client = new Client($guzzle_params);
      $submitPatientResponse = $client->request('POST', 'signup', [
        'form_params' => [
          'email' => $request->input("email"),
          'username' => $request->input("username"),
          'password' => 'password',
          'confirmPassword' => 'password',
          'role' => "patient",
          'name' => $request->input("name"),
          'birthdate' => $request->input("birthDate"),
          'nik' => $request->input("nik"),
          'puskesmasId' => Session::get('username')
        ]
      ]);
      return json_decode($submitPatientResponse->getBody(), true);
    }
}

?>