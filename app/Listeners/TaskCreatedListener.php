<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class TaskCreatedListener implements ShouldQueue
{
    public $connection = 'database';

    public $queue = 'pusher';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        Mail::raw('Task handled', function($message) use ($event) {
            $message->from('us@example.com', 'Laravel');
            $message->to('foo@example.com');
            $message->subject('Task ' . $event->task->id . ' handled');
        });

        return true;
    }

    public function failed(TaskCreated $event, $exception)
    {
        Mail::raw('Task failed', function($message) use ($event) {
            $message->from('us@example.com', 'Laravel');
            $message->to('foo@example.com');
            $message->subject('Task failed');
        });
    }
}
