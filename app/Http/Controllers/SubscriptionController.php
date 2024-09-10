<?php

namespace App\Http\Controllers;

use App\Subscription\StripeSubscriptionDecorator;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        return view('subscription.index', [
            'plan' => $request->user()->subscribed()
                ? new StripeSubscriptionDecorator($request->user()->subscription()->asStripeSubscription())
                : null,
            'upcoming' => $request->user()->upcomingInvoice()
        ]);
    }

    public function portal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(route('subscription'));
    }
}
