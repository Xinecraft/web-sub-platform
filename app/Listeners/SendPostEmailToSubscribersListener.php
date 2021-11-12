<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendPostEmailToSubscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostEmailToSubscribersListener implements ShouldQueue
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        // get all subscribers of this website
        $websiteSubscribers = $event->post->website->subscribers()->cursor();

        foreach ($websiteSubscribers as $subscriber) {
            SendPostEmailToSubscriber::dispatch($event->post, $subscriber);
        }
    }
}
