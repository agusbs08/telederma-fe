<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class Controller extends BaseController
{
    protected $client;
    protected $token;
    protected $guzzleConfig;

    function __construct(){
        $this->token = Session::get('auth-key', 'default');
        $this->guzzleConfig = [
            'base_uri' => 'http://localhost:5000/teledermatology-20e41/us-central1/api/',
            'http_errors' => false,
            'headers' => ['Authorization' => 'Bearer ' . $this->token]
        ];
        // if ($this->token != 'default'){
        //     $this->guzzleConfig['headers'] = [
        //         'Authorization' => 'Bearer ' . $this->token
        //     ];
        // }
        $this->client = new Client($this->guzzleConfig);
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
