<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription.index');
    }

    public function portal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(route('subscription'));
    }
}
