<?php

namespace App\Observers;

use App\Events\PaymentCreatedEvent;
use App\Payment;
use Illuminate\Support\Str;

class PaymentObserver
{
    /**
     * Handle the payment "creating" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function creating(Payment $payment)
    {
        $payment->uuid = Str::uuid();
        $payment->expires_at = now()->addMonths(5);
    }

    /**
     * Handle the payment "created" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function created(Payment $payment)
    {
        event(new PaymentCreatedEvent($payment));
    }
}
