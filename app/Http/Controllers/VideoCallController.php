<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Pusher\Pusher;

class VideoCallController extends Controller
{
    public function callToUser(Request $request, $id) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('d39c0affa9d55257c0c1', '3b438ddcfd2dd64bbc22', '833788', [
            'cluster' => 'ap1',
            'encrypted' => true
        ]);

        $presence_data = ['name' => 'kola'];
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
