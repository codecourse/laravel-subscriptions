<?php

namespace App\Listeners;

use App\Mail\SubscriptionEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Events\WebhookReceived;

class HandleSubscriptionEnded
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] !== 'customer.subscription.deleted') {
            return;
        }

        $user = $this->getUserByStripeId($event->payload['data']['object']['customer']);

        Mail::to($user)
            ->send(new SubscriptionEnded());
    }

    protected function getUserByStripeId(string $stripeId)
    {
        return Cashier::findBillable($stripeId);
    }
}
