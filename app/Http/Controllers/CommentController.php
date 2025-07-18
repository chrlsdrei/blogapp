<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $post->slug);
    }
}
