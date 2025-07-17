<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Logic for the home can be added here
        return view('components.users.home');
    }
}
