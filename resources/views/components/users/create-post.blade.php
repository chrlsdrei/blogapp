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
        <p class="text-lg text-camarone-700">Share your thoughts with your fellow gardeners!</p>
    </div>

    <x-radix.card class="blog-post-card">
        <x-radix.card-content>
            <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <x-radix.label for="title" class="block text-sm font-medium text-camarone-800 mb-2">Title</x-radix.label>
                    <x-radix.text-field>
                        <x-radix.text-field-input 
                            type="text" 
                            id="title" 
                            name="title" 
                            required
                            placeholder="Enter your post title..."
                            class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200" />
                    </x-radix.text-field>
                </div>

                <div>
                    <x-radix.label for="description" class="block text-sm font-medium text-camarone-800 mb-2">Description</x-radix.label>
                    <x-radix.text-area>
                        <x-radix.text-area-input 
                            id="description" 
                            name="description" 
                            rows="3"
                            placeholder="Brief description of your post..."
                            class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"></x-radix.text-area-input>
                    </x-radix.text-area>
                </div>

                <div>
                    <x-radix.label for="body" class="block text-sm font-medium text-camarone-800 mb-2">Content</x-radix.label>
                    <x-radix.text-area>
                        <x-radix.text-area-input 
                            id="body" 
                            name="body" 
                            rows="10" 
                            required
                            placeholder="Write your post content here..."
                            class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200"></x-radix.text-area-input>
                    </x-radix.text-area>
                </div>

                <div class="flex gap-4 justify-end">
                    <x-radix.button variant="ghost" as-child>
                        <a href="{{ route('home') }}" class="auth-button auth-button-secondary">
                            Cancel
                        </a>
                    </x-radix.button>
                    <x-radix.button type="submit" class="auth-button auth-button-primary">
                        Create Post
                    </x-radix.button>
                </div>
            </form>
        </x-radix.card-content>
    </x-radix.card>
</main>

</body>
</html>
