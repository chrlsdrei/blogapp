<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;

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

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        // Check if the user is authorized to delete this comment
        $this->authorize('delete', $comment);

        // Delete the comment
        $comment->delete();

        // Redirect back to the post with success message
        return redirect()->route('posts.show', $post->slug)
                        ->with('success', 'Comment deleted successfully!');
    }
}
