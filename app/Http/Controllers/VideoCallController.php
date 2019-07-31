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
    }
}
