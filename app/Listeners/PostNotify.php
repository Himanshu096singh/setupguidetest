<?php

namespace App\Listeners;

use App\Events\PostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PostMail;
class PostNotify
{
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
     * @param  \App\Events\PostEvent  $event
     * @return void
     */
    public function handle(PostEvent $event)
    {
        $user = "himanshu01eglobalsoft@gmail.com";
        \Mail::to($user)->send(new PostMail($event->post));
    }
}
