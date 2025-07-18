<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(5);

        return view('components.users.home', [ 'posts' => $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.users.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Generate slug from title
        $baseSlug = \Illuminate\Support\Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;

        // Check if slug exists and make it unique
        while (Post::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        // Validate the request
        $fields = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'body' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        // Create the post
        Auth::user()->posts()->create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'body' => $request->body,
            'featured_image' => $request->featured_image,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Load the user relationship for the post and comments with their users (latest first)
        $post->load(['user', 'comments.user' => function ($query) {
            $query->latest();
        }]);

        // Order comments by latest first
        $post->comments = $post->comments->sortByDesc('created_at');

        return view('components.users.posts', compact('post'));
    }    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
