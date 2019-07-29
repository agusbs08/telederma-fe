<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function getLoginView()
    {
      return view('pages.login')->with('pagename', 'login');
    }

    public function login(Request $request)
    {
      $response = $this->client->request('POST', 'login', [
        'form_params' => [
          'username' => $request->input('username'),
          'password' => $request->input('password')
        ]
      ]);
      // 200 for success
      // 400 for wrong credentials
      // 404 for there's no user found
      $responseCode = $response->getStatusCode();
      if ($responseCode == 200){
        // session([
        //   'auth-key' => json_decode($response->getBody(), true)['token'],
        //   'authenticated' => "true",
        //   'username' => "puskesmas",
        //   'role' => "puskesmas"
        // ]);
        echo Session::get('auth-key', 'default');
        // return redirect()->route('puskesmas.patients');
      } elseif ($responseCode == 400) {
        return response()->json(['msg' => 'wrong password']);
      } elseif ($responseCode == 404) {
        return response()->json(['msg' => 'user not found']);
      } else {
        return response()->json(['msg' => 'something went wrong']);
      }
    }
}

?>