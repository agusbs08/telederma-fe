<?php

namespace App\Http\Controllers\Conversation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\MessageSent;

class ConversationController extends Controller
{
    public function getConversationListView()
    {
        return view('components.conversation')->with('pagename', 'conversation-list');
    }

    public function sendMessage()
    {
        broadcast(new MessageSent("user", "message"))->toOthers();
    }
}
