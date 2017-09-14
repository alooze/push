<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class ChatsController extends Controller
{
    public function index()
    {
      return view('chat');
    }

    public function fetchMessages()
    {
      return Task::get();
    }

    public function sendMessage(Request $request)
    {
      $message = Task::create([
        'content' => $request->input('message'),
        'name' => 'test',
        'status' => '1',
      ]);

      return ['status' => 'Message Sent!'];
    }
}
