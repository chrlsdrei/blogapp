<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Show admin registration form
     */
    public function showRegister()
    {
        return view('components.admin.register');
    }

    /**
     * Handle admin registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'contactNumber' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'username' => $request->username,
            'contactNumber' => $request->contactNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin account created successfully! Please login.');
    }

    /**
     * Show admin login form
     */
    public function showLogin()
    {
        return view('components.admin.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        $totalPosts = Post::count();
        $pendingPosts = Post::pending()->count();
        $approvedPosts = Post::approved()->count();
        $declinedPosts = Post::declined()->count();

        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return view('components.admin.dashboard', compact('totalPosts', 'pendingPosts', 'approvedPosts', 'declinedPosts', 'posts'));
    }

    /**
     * Approve a post
     */
    public function approvePost(Post $post)
    {
        $post->update(['status' => 'approved']);
        return redirect()->route('admin.dashboard')->with('success', 'Post approved successfully!');
    }

    /**
     * Decline a post
     */
    public function declinePost(Post $post)
    {
        $post->update(['status' => 'declined']);
        return redirect()->route('admin.dashboard')->with('success', 'Post declined successfully!');
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('welcome');
    }
}
