<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PuskesmasPatientController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function getPatientsListView(Request $request)
    {
      echo $this->token;
      print_r($this->guzzleConfig);
      // $response = $this->client->request('GET', 'puskesmas/'.$request->session()->get('role'));
      // return view('partials.puskesmas.patients.patients-list')
      //   ->with('data', json_decode($response->getBody(), true));
    }
}

?>