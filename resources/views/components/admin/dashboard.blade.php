<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Blog Your Garden</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-camarone-50">
    <x-nav />

    <main class="min-h-screen p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-camarone-800 mb-2">Admin Dashboard</h1>
                <p class="text-camarone-600">Manage posts and monitor your blog</p>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <x-radix.card class="p-6">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-camarone-800">{{ $totalPosts }}</h3>
                        <p class="text-camarone-600">Total Posts</p>
                    </div>
                </x-radix.card>

                <x-radix.card class="p-6">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-yellow-600">{{ $pendingPosts }}</h3>
                        <p class="text-camarone-600">Pending Posts</p>
                    </div>
                </x-radix.card>

                <x-radix.card class="p-6">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-green-600">{{ $approvedPosts }}</h3>
                        <p class="text-camarone-600">Approved Posts</p>
                    </div>
                </x-radix.card>

                <x-radix.card class="p-6">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-red-600">{{ $declinedPosts }}</h3>
                        <p class="text-camarone-600">Declined Posts</p>
                    </div>
                </x-radix.card>
            </div>

            <!-- Posts Table -->
            <x-radix.card class="p-6">
                <h2 class="text-xl font-bold text-camarone-800 mb-6">Post Management</h2>
                
                @if($posts->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-camarone-200">
                                    <th class="text-left py-3 px-4 font-medium text-camarone-700">Title</th>
                                    <th class="text-left py-3 px-4 font-medium text-camarone-700">Author</th>
                                    <th class="text-left py-3 px-4 font-medium text-camarone-700">Created</th>
                                    <th class="text-left py-3 px-4 font-medium text-camarone-700">Status</th>
                                    <th class="text-left py-3 px-4 font-medium text-camarone-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="border-b border-camarone-100 hover:bg-camarone-50">
                                        <td class="py-4 px-4">
                                            <div>
                                                <h3 class="font-medium text-camarone-800">{{ $post->title }}</h3>
                                                <p class="text-sm text-camarone-600">{{ Str::limit($post->description, 50) }}</p>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 text-camarone-700">
                                            {{ $post->user->username }}
                                        </td>
                                        <td class="py-4 px-4 text-camarone-700">
                                            {{ $post->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="py-4 px-4">
                                            @if($post->status === 'pending')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            @elseif($post->status === 'approved')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Approved
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Declined
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="flex gap-2">
                                                @if($post->status === 'pending')
                                                    <form method="POST" action="{{ route('admin.posts.approve', $post) }}" class="inline">
                                                        @csrf
                                                        <x-radix.button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1">
                                                            Approve
                                                        </x-radix.button>
                                                    </form>
                                                    <form method="POST" action="{{ route('admin.posts.decline', $post) }}" class="inline">
                                                        @csrf
                                                        <x-radix.button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1">
                                                            Decline
                                                        </x-radix.button>
                                                    </form>
                                                @else
                                                    <span class="text-camarone-500 text-sm">No actions available</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-camarone-600">No posts found.</p>
                    </div>
                @endif
            </x-radix.card>

            <!-- Logout Button -->
            <div class="mt-8 text-center">
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <x-radix.button type="submit" class="auth-button auth-button-secondary">
                        Logout
                    </x-radix.button>
                </form>
            </div>
        </div>
    </main>
</body>
</html> 