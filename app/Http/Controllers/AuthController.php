<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'username' => 'required|max:255',
            'contact_number' => 'nullable|digits:11',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create($fields);


        Auth::login($user);
        return redirect()->route('login')->with('success', 'Registration successful! Welcome to the blog app.');
    }

    //Login User
    public function login(Request $request){
    $fields = $request->validate([
        'username' => 'required|max:255',
        'password' => 'required|min:5',
    ]);


    //Try to Login

    if (Auth::attempt($fields, $request->remember)) {
        return redirect()->route('dashboard')->with('success', 'Login successful! Welcome back.');
    } else{
        return back()->withErrors([
            'login_error' => 'Invalid credentials. Please try again.',
        ]);
    }
}

    //Logout User
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('success', 'You have been logged out successfully.');
    }
}
