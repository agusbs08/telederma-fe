<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Pusher\Pusher;

class VideoCallController extends Controller
{
    public function callToUser(Request $request, $id, $name) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('ed6c4e67e5c5bf35c1ef', '155cb4c7db49fc81cce0', '846318', [
            'cluster' => 'ap1',
            'encrypted' => true
        ]);

        $presence_data = ['name' => $name ];
        $key = $pusher->presence_auth($channelName, $socketId, $id, $presence_data);

        return response($key);
        // error_log('Anjing');
         
        // $url = "http://localhost:5000/teledermatology-20e41/asia-northeast1/api/pusher/auth/" .$id;
        
        // $request = $client->post($url,  ['body'=>$body]);
        // $response = $request->send();
        // // return $response;
        // error_log('socket_id:' . $socketId);    
        // $client = new \GuzzleHttp\Client();
        // error_log('channel: ' .$channelName);
        // $response = $client->post(
        //     $url,
        //     [
        //         \GuzzleHttp\RequestOptions::JSON => 
        //         [   'socket_id' => $socketId,
        //             'channel_name' => $channelName
        //         ]
        //     ],
        //     ['Content-Type' => 'application/json']
        // );
        // error_log('BGSD JING');
        // return json_decode($response->getBody(), true);
    }

}
