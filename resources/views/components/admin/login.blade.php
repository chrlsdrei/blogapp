<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Blog Your Garden</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-camarone-50">
    <x-nav />

    <main class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-camarone-800 mb-2">Admin Login</h1>
                <p class="text-camarone-600">Access the admin dashboard</p>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <x-radix.card class="p-8">
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <x-radix.label for="email" class="text-camarone-700 font-medium">Email</x-radix-label>
                        <x-radix.text-field-input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full mt-1"
                            placeholder="Enter your email"
                        />
                    </div>

                    <div>
                        <x-radix.label for="password" class="text-camarone-700 font-medium">Password</x-radix-label>
                        <x-radix.text-field-input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="w-full mt-1"
                            placeholder="Enter your password"
                        />
                    </div>

                    <x-radix.button type="submit" class="w-full auth-button auth-button-primary">
                        Login as Admin
                    </x-radix.button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-camarone-600">
                        Don't have an admin account?
                        <a href="{{ route('admin.register') }}" class="text-camarone-700 font-medium hover:text-camarone-800">
                            Register here
                        </a>
                    </p>
                </div>
            </x-radix.card>
        </div>
    </main>
</body>
</html> 