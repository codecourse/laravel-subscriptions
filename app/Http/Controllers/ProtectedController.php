<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function index()
    {
        return view('protected.index');
    }
}
