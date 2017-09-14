<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Events\TaskCreated;

class Home extends Controller
{
    public function index()
    {
        $out = '';

        for ($i=0; $i<3; $i++) {
            $task = Task::create([
                'name' => 'Test task',
                'content' => 'CONTENT',
                'status' => '1',
            ]);

            event(new TaskCreated($task));
            $out.= 'Task ' . $task->id . ' created<br>' . PHP_EOL;
        }
        return $out;
    }

    public function pusher()
    {
        return view('pusher');
    }
}
