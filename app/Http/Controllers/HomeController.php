<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('components.users.home');
    }

    public function profile()
    {
        // Get posts for the authenticated user
        $posts = Post::where('user_id', auth()->id())
                    ->with('user')
                    ->latest()
                    ->get();

        return view('components.users.profile', compact('posts'));
    }
}
