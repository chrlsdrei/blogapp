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
            <x-radix.alert class="mb-6">
                <x-radix.alert-icon />
                <x-radix.alert-content>
                    <x-radix.alert-title>Success</x-radix.alert-title>
                    <x-radix.alert-description>{{ session('success') }}</x-radix.alert-description>
                </x-radix.alert-content>
            </x-radix.alert>
        @endif

        @if($errors->any())
            <x-radix.alert variant="destructive" class="mb-6">
                <x-radix.alert-icon />
                <x-radix.alert-content>
                    <x-radix.alert-title>Error</x-radix.alert-title>
                    <x-radix.alert-description>
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-radix.alert-description>
                </x-radix.alert-content>
            </x-radix.alert>
        @endif

        <form action="{{ route('posts.update', $post->slug) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-radix.label for="title" class="block text-sm font-medium text-camarone-800 mb-2">Post Title</x-radix.label>
                <x-radix.text-field>
                    <x-radix.text-field-input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title', $post->title) }}" 
                        required
                        placeholder="Enter your post title"
                        class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200" />
                </x-radix.text-field>
            </div>

            <div>
                <x-radix.label for="description" class="block text-sm font-medium text-camarone-800 mb-2">Description (Optional)</x-radix.label>
                <x-radix.text-area>
                    <x-radix.text-area-input 
                        id="description" 
                        name="description" 
                        rows="3"
                        placeholder="Brief description of your post"
                        class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200">{{ old('description', $post->description) }}</x-radix.text-area-input>
                </x-radix.text-area>
            </div>

            <div>
                <x-radix.label for="body" class="block text-sm font-medium text-camarone-800 mb-2">Content</x-radix.label>
                <x-radix.text-area>
                    <x-radix.text-area-input 
                        id="body" 
                        name="body" 
                        rows="12" 
                        required
                        placeholder="Write your post content here..."
                        class="w-full px-4 py-3 border border-camarone-200 rounded-lg focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 transition-colors duration-200">{{ old('body', $post->body) }}</x-radix.text-area-input>
                </x-radix.text-area>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-camarone-200">
                <x-radix.button variant="ghost" as-child>
                    <a href="{{ route('profile') }}" class="inline-flex items-center px-4 py-2 text-camarone-600 hover:text-camarone-700 font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Profile
                    </a>
                </x-radix.button>

                <div class="flex items-center gap-3">
                    <x-radix.button type="submit" class="inline-flex items-center px-6 py-2 bg-camarone-600 text-white rounded-lg hover:bg-camarone-700 font-medium transition-colors duration-200 cursor-pointer">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Post
                    </x-radix.button>
                </div>
            </div>
        </form>
    </div>
</main>

</body>
</html>
