<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logic for the dashboard can be added here
        return view('components.users.dashboard');
    }
}
