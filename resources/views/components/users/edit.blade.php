<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Edit Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-camarone-100">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-4xl">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-camarone-800 mb-2">Edit Post</h1>
            <p class="text-camarone-600">Update your post details below</p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->slug) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-camarone-800 mb-2">Post Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required
                       class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                       placeholder="Enter your post title">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-camarone-800 mb-2">Description (Optional)</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                          placeholder="Brief description of your post">{{ old('description', $post->description) }}</textarea>
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-camarone-800 mb-2">Content</label>
                <textarea id="body" name="body" rows="12" required
                          class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                          placeholder="Write your post content here...">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <label for="featured_image" class="block text-sm font-medium text-camarone-800 mb-2">Featured Image URL (Optional)</label>
                <input type="url" id="featured_image" name="featured_image" value="{{ old('featured_image', $post->featured_image) }}"
                       class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"
                       placeholder="https://example.com/image.jpg">
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-camarone-200">
                <a href="{{ route('profile') }}" class="inline-flex items-center px-4 py-2 text-camarone-600 hover:text-camarone-700 font-medium transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Profile
                </a>

                <div class="flex items-center gap-3">
                    <button type="submit" class="inline-flex items-center px-6 py-2 bg-camarone-600 text-white rounded-lg hover:bg-camarone-700 font-medium transition-colors duration-200 cursor-pointer">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

</body>
</html>
