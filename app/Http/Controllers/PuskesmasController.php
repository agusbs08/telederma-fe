<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\User as User;


class PuskesmasController extends Controller
{
    public function getPatients() {
        $puskesmas_id = "puskesmas";
        $patients = array(
            array(
                "username" => "valore",
                "role" => "valore2"
            ),
            array(
                "username" => "valore",
                "role" => "valore2"
            ),
            array(
                "username" => "valore",
                "role" => "valore2"
            )
        );
        return view('puskesmas.data-table-patient')->with('patients', $patients);
    }
}
