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

<main class="py-8 px-4 mx-auto max-w-lg">
    <h1 class="text-4xl font-bold text-camarone-800 mb-4">Hello {{auth()->user()->username}}!</h1>
    <p class="text-lg text-camarone-700">Welcome!</p>

    @foreach ($posts as $post)
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-camarone-800 mb-2">{{ $post->title }}</h2>
            <p class="text-sm text-camarone-400 mb-2">Posted {{ $post->created_at->diffForHumans() }} by USER</p>
            <p class="text-camarone-600 mb-4">{{ $post->description }}</p>
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
            <p class="text-camarone-500 mb-4">{{ $post->body }}</p>
            <a href="{{ route('posts.show', $post->slug) }}" class="text-camarone-600 hover:text-camarone-800">Read more</a>
        </div>
    @endforeach

</main>

</body>
</html>
