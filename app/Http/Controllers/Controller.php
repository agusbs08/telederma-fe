<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;

$baseUrl = "localhost:5000";

class Controller extends BaseController
{
    protected $client;
    private $token = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjI4Y2M2MzEyZWVkYjI1MzIwMDQyMjI4MWE4MTQ4N2UyYTkzMjJhOTIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vdGVsZWRlcm1hdG9sb2d5LTIwZTQxIiwiYXVkIjoidGVsZWRlcm1hdG9sb2d5LTIwZTQxIiwiYXV0aF90aW1lIjoxNTY0NDA1MzAyLCJ1c2VyX2lkIjoidDZQa2k1U1RXS2RZRUkzQWlPR0Jqc3B4c0hJMiIsInN1YiI6InQ2UGtpNVNUV0tkWUVJM0FpT0dCanNweHNISTIiLCJpYXQiOjE1NjQ0MDUzMDIsImV4cCI6MTU2NDQwODkwMiwiZW1haWwiOiJwdXNrZXNtYXNAZW1haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7ImVtYWlsIjpbInB1c2tlc21hc0BlbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJwYXNzd29yZCJ9fQ.Qggj4ZYa-e-yJE8OlbCAeYyLE0RYOZIFAtrNlWjMA2VVeY4MPzhKA7hZdSPGOl6tBqnXxb1E7icO63qi4k9jFW3TLbTO2-YEtdO1ET83UaWu3b7hP5hsMN45okhCrlgtDrpONdklJTrqQBAbvFc-TvTyQm1UIt0pxsJzsTGGts_OiOoGQNClPBo0cnaHA1finvFqQ4zmSVSwD3KA0GdpxPnweoKWXXN_ZRXatA3x4CwMQY1VrqSwOyEQoboiGPfQ4uR0a3SrxIlX_hHjn-oNibgokQM0M5zqAaSdluVz3QxvO32XAXyYtU6uVSCemb_YFI7jJyOvPa4BSo0lRlX57g';
    function __construct(){
        $this->client = new Client([
            'base_uri' => 'http://localhost:5000/teledermatology-20e41/us-central1/api/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ]
        ]);
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
