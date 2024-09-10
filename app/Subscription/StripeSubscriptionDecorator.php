<?php

namespace App\Subscription;

use Stripe\Subscription;

class StripeSubscriptionDecorator
{
    public function __construct(protected Subscription $subscription) {}

    public function title()
    {
        return $this->planFromPriceId($this->subscription->plan->id)['name'];
    }

    public function currency()
    {
        return strtoupper($this->subscription->currency);
    }

    protected function planFromPriceId(string $priceId)
    {
        return once(function () use ($priceId) {
            return collect(config('subscriptions.plans'))
                ->first(fn ($plan) => $plan['price_id'] === $priceId);
        });
    }
}
