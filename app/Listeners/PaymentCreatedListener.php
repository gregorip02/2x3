<?php

namespace App\Listeners;

use App\Events\PaymentCreatedEvent as Event;
use App\Mail\PaymentCreatedMailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PaymentCreatedListener implements ShouldQueue
{
    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 5;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Event $event)
    {
        $to = $event->to();

        Mail::to($to)->send(new PaymentCreatedMailable($event->payment));
    }
}
