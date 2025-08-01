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
    @if(session('success'))
        <x-radix.alert class="mb-6">
            <x-radix.alert-icon />
            <x-radix.alert-content>
                <x-radix.alert-title>Success</x-radix.alert-title>
                <x-radix.alert-description>{{ session('success') }}</x-radix.alert-description>
            </x-radix.alert-content>
        </x-radix.alert>
    @endif

    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-camarone-800 mb-4">Welcome to your profile {{auth()->user()->username}}!</h1>
    </div>

    <div class="grid gap-8 grid-cols-1">
        @if($posts->count() > 0)
            <x-card :posts="$posts" />
        @else
            <x-radix.card class="text-center py-12">
                <x-radix.card-content>
                    <svg class="mx-auto w-16 h-16 text-camarone-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-camarone-800 mb-2">No posts yet</h3>
                    <p class="text-camarone-600 mb-4">You haven't created any posts yet. Start sharing your thoughts!</p>
                    <x-radix.button as-child>
                        <a href="{{ route('create-post') }}" class="inline-flex items-center px-4 py-2 bg-camarone-600 text-white rounded-lg hover:bg-camarone-700 transition-colors duration-200">
                            Create Your First Post
                        </a>
                    </x-radix.button>
                </x-radix.card-content>
            </x-radix.card>
        @endif
    </div>

</main>

</body>
</html>
