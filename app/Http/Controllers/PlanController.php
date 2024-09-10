<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = collect(config('subscriptions.plans'));

        return view('plans', [
            'monthly' => $plans->get('monthly')
        ]);
    }
}
