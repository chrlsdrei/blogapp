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
}
