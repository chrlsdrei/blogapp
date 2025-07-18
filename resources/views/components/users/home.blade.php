<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-camarone-100">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-4xl">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-camarone-800 mb-4">Hello {{auth()->user()->username}}!</h1>
        <p class="text-lg text-camarone-700">Welcome to your blog dashboard!</p>
    </div>

    <div class="grid gap-8 grid-cols-1">

    @foreach ($posts as $post)
        <article class="blog-post-card mb-8">
            <h2 class="blog-post-title">{{ $post->title }}</h2>

            @if($post->featured_image)
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
            @endif

            @if($post->excerpt)
                <p class="text-camarone-600 mb-4 font-medium">{{ $post->excerpt }}</p>
            @endif

            <div class="blog-post-body">{{ $post->body }}</div>

            <div class="blog-post-meta">
                <span class="blog-post-date">{{ $post->created_at->diffForHumans() }}</span>
                <span class="blog-post-author">{{ auth()->user()->username }}</span>
            </div>

            <div class="mt-4">
                <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-camarone-600 hover:text-camarone-700 font-semibold transition-colors duration-200">
                    Read more
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </article>
    @endforeach
    </div>

</main>

<div class="mt-8 bg-camarone-50 p-4 rounded-lg shadow-md">
    {{ $posts->links() }}
</div>

</body>
</html>
