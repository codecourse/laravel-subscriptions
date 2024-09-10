<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $plan = collect(config('subscriptions.plans'))->get($request->plan);

        return $request->user()->newSubscription('default', $plan['price_id'])
            ->checkout([
                'success_url' => route('dashboard'),
                'cancel_url' => route('plans')
            ]);
    }
}
