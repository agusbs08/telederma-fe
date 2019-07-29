<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

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
      // $response = $client->request('POST', 'login', [
      //   'username' => $request->username,
      //   'password' => $request->password
      // ]);
      // return Response(json_decode($response->getBody(), true));

      if($request->ajax()) {
        print_r($request);
      }
    }
}

?>