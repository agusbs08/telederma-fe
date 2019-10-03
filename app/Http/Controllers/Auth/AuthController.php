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
      return view('pages.login')
        ->with('pagetitle', 'Login')
        ->with('pagename', 'login');
    }

    public function login(Request $request)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . Session::get('auth-key', 'default')];
      $client = new Client($guzzle_params);
      $loginResponse = $client->request('POST', 'login', [
        'form_params' => [
          'email' => $request->input('email'),
          'password' => $request->input('password')
        ]
      ]);
      if ($loginResponse->getStatusCode() == 200){
        $token = json_decode($loginResponse->getBody(), true)['token'];
        $id = json_decode($loginResponse->getBody(), true)['id'];
        $userDetails = $this->setLoginSession($id, $token);
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

    function setLoginSession($id, $token)
    {
      $guzzle_params = config('app.guzzle_params');
      $guzzle_params['headers'] = ['Authorization' => 'Bearer ' . $token];
      $client = new Client($guzzle_params);
      $getUserDetailResponse = $client->request('GET', 'users/' . $id);
      $userDetails = json_decode($getUserDetailResponse->getBody(), true);
      $userData = [
        'user-id' => $id,
        'name' => $userDetails['name'],
        'auth-key' => $token,
        'authenticated' => "true",
        'role' => $userDetails['role'],
        'profile-picture' => $userDetails['profilePicture']
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
