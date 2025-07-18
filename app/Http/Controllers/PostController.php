<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;
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
        ]);

        // Create the post
        Auth::user()->posts()->create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'body' => $request->body,
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
        // Check if the user is authorized to edit this post
        $this->authorize('update', $post);

        return view('components.users.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Check if the user is authorized to update this post
        $this->authorize('update', $post);

        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'body' => 'required|string',
        ]);

        // Generate slug from title if title has changed
        if ($post->title !== $validated['title']) {
            $validated['slug'] = \Str::slug($validated['title']);

            // Ensure slug is unique
            $originalSlug = $validated['slug'];
            $counter = 1;
            while (Post::where('slug', $validated['slug'])->where('id', '!=', $post->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Update the post
        $post->update($validated);

        // Redirect back to the edit page with success message
        return redirect()->route('posts.edit', $post->slug)
                        ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Check if the user is authorized to delete this post
        $this->authorize('delete', $post);

        // Delete the post
        $post->delete();

        // Get redirect URL from request or default to profile
        $redirectUrl = request('redirect_back', route('profile'));

        // Redirect back with success message
        return redirect($redirectUrl)->with('success', 'Post deleted successfully!');
    }
}
