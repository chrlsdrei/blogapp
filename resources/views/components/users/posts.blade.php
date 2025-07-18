<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }} - {{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-camarone-100">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-4xl">
    <!-- Back to Home Button -->
    <div class="mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center text-camarone-600 hover:text-camarone-700 font-semibold transition-colors duration-200">
            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Home
        </a>
    </div>

    <!-- Post Content -->
    <article class="blog-post-card mb-8">
        <!-- Post Title -->
        <h1 class="text-4xl font-bold text-camarone-800 mb-6 leading-tight">{{ $post->title }}</h1>

        <!-- Post Meta Information -->
        <div class="blog-post-meta mb-6">
            <span class="blog-post-date">Published {{ $post->created_at->format('F j, Y') }}</span>
            <span class="blog-post-author">by {{ $post->user->username }}</span>
        </div>

        <!-- Featured Image -->
        @if($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg mb-6">
        @endif

        <!-- Post Excerpt -->
        @if($post->description)
            <div class="text-xl text-camarone-700 mb-6 font-medium leading-relaxed border-l-4 border-camarone-500 pl-6">
                {{ $post->description }}
            </div>
        @endif

        <!-- Post Body -->
        <div class="blog-post-body text-lg leading-relaxed">
            {!! nl2br(e($post->body)) !!}
        </div>
    </article>

    <!-- Comments Section -->
    <div class="blog-post-card">
        <h2 class="text-2xl font-bold text-camarone-800 mb-6">Comments</h2>

        <!-- Existing Comments Display -->
        <div id="comments-list" class="mb-8">
            @if($post->comments->count() > 0)
                @foreach($post->comments as $comment)
                    <div class="bg-camarone-50 border border-camarone-200 rounded-lg p-4 mb-4">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-semibold text-camarone-800">{{ $comment->user->username }}</h4>
                            <span class="text-sm text-camarone-600">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-camarone-700 leading-relaxed">{!! nl2br(e($comment->comment)) !!}</p>
                    </div>
                @endforeach
            @else
                <!-- Placeholder for no comments -->
                <div class="text-center py-8 text-camarone-600">
                    <svg class="mx-auto w-12 h-12 mb-4 text-camarone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a8.959 8.959 0 01-4.906-1.468L3 21l2.532-5.906A8.959 8.959 0 013 12c0-4.418 3.582-8 8-8s8 3.582 8 8z"></path>
                    </svg>
                    <p class="text-lg">No comments yet. Be the first to share your thoughts!</p>
                </div>
            @endif
        </div>

        <!-- Add Comment Form -->
        @auth
        <div class="border-t border-camarone-200 pt-8">
            <h3 class="text-xl font-semibold text-camarone-800 mb-4">Leave a Comment</h3>
            <form action="{{ route('comments.store', $post) }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="comment" class="block text-sm font-medium text-camarone-800 mb-2">Your Comment</label>
                    <textarea id="comment" name="comment" rows="4" required
                              class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                              placeholder="Share your thoughts about this post..."></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="auth-button auth-button-primary">
                        Post Comment
                    </button>
                </div>
            </form>
        </div>
        @else
        <div class="border-t border-camarone-200 pt-8 text-center">
            <p class="text-camarone-600 mb-4">Please log in to leave a comment.</p>
            <a href="{{ route('login') }}" class="auth-button auth-button-primary inline-block">
                Login to Comment
            </a>
        </div>
        @endauth
    </div>
</main>

</body>
</html>
