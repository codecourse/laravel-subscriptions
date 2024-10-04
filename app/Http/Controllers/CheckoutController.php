<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(
            $plan = collect(config('subscriptions.plans'))->get($request->plan),
            404
        );

        return $request->user()->newSubscription('default', $plan['price_id'])
            //->trialDays(4)
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('dashboard'),
                'cancel_url' => route('plans')
            ], [
                'email' => $request->user()->email
            ]);
    }
}
