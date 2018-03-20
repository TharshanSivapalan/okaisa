<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * WelcomeController index
     */
    public function index()
    {
        return view('welcome', ['message' => session()->get("message")]);
    }

}