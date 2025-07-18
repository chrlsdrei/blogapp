<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Create Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-camarone-100">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-4xl">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-camarone-800 mb-4">Create New Post</h1>
        <p class="text-lg text-camarone-700">Share your thoughts with the world</p>
    </div>

    <div class="blog-post-card">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-camarone-800 mb-2">Title</label>
                <input type="text" id="title" name="title" required
                       class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                       placeholder="Enter your post title...">
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-camarone-800 mb-2">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                          placeholder="Brief description of your post..."></textarea>
            </div>

            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-camarone-800 mb-2">Content</label>
                <textarea id="body" name="body" rows="10" required
                          class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                          placeholder="Write your post content here..."></textarea>
            </div>

            <div class="mb-6">
                <label for="featured_image" class="block text-sm font-medium text-camarone-800 mb-2">Featured Image URL</label>
                <input type="url" id="featured_image" name="featured_image"
                       class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                       placeholder="https://example.com/image.jpg">
            </div>

            <div class="mb-6">
                <label for="published_at" class="block text-sm font-medium text-camarone-800 mb-2">Publish Date</label>
                <input type="datetime-local" id="published_at" name="published_at"
                       class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200">
            </div>

            <div class="flex gap-4 justify-end">
                <a href="{{ route('home') }}"
                   class="auth-button auth-button-secondary">
                    Cancel
                </a>
                <button type="submit"
                        class="auth-button auth-button-primary">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
