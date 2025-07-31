<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - Blog Your Garden</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-camarone-50">
    <x-nav />

    <main class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-camarone-800 mb-2">Admin Registration</h1>
                <p class="text-camarone-600">Create your admin account</p>
            </div>

            <x-radix.card class="p-8">
                <form method="POST" action="{{ route('admin.register') }}" class="space-y-6">
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
                        <x-radix.label for="username" class="text-camarone-700 font-medium">Username</x-radix-label>
                        <x-radix.text-field-input
                            id="username"
                            name="username"
                            type="text"
                            value="{{ old('username') }}"
                            required
                            class="w-full mt-1"
                            placeholder="Enter your username"
                        />
                    </div>

                    <div>
                        <x-radix.label for="contactNumber" class="text-camarone-700 font-medium">Contact Number</x-radix-label>
                        <x-radix.text-field-input
                            id="contactNumber"
                            name="contactNumber"
                            type="text"
                            value="{{ old('contactNumber') }}"
                            required
                            class="w-full mt-1"
                            placeholder="Enter your contact number"
                        />
                    </div>

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

                    <div>
                        <x-radix.label for="password_confirmation" class="text-camarone-700 font-medium">Confirm Password</x-radix-label>
                        <x-radix.text-field-input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            class="w-full mt-1"
                            placeholder="Confirm your password"
                        />
                    </div>

                    <x-radix.button type="submit" class="w-full auth-button auth-button-primary">
                        Register as Admin
                    </x-radix.button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-camarone-600">
                        Already have an admin account?
                        <a href="{{ route('admin.login') }}" class="text-camarone-700 font-medium hover:text-camarone-800">
                            Login here
                        </a>
                    </p>
                </div>
            </x-radix.card>
        </div>
    </main>
</body>
</html> 