<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-image">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-lg">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <x-radix.card class="p-8 rounded-lg shadow-md w-full sm:max-w-md mt-6 bg-white border border-camarone-200">
            <x-radix.card-header>
                <x-radix.card-title class="text-3xl font-bold text-center text-camarone-800 mb-8">
                    Welcome Gardeners!
                </x-radix.card-title>
            </x-radix.card-header>

            <x-radix.card-content>
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Username -->
                    <div>
                        <x-radix.label for="username" class="block mb-2 text-sm font-medium text-camarone-700">Username</x-radix.label>
                        <x-radix.text-field>
                            <x-radix.text-field-input 
                                id="username" 
                                type="text" 
                                name="username" 
                                value="{{ old('username') }}"
                                placeholder="Enter your username"
                                class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900" />
                        </x-radix.text-field>
                        @error('username')
                        <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <x-radix.label for="password" class="block mb-2 text-sm font-medium text-camarone-700">Password</x-radix.label>
                        <x-radix.text-field>
                            <x-radix.text-field-input 
                                id="password" 
                                type="password" 
                                name="password"
                                placeholder="Enter your password"
                                class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900" />
                        </x-radix.text-field>
                        @error('password')
                        <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center space-x-2">
                        <x-radix.checkbox id="remember" name="remember" />
                        <x-radix.label for="remember" class="text-sm text-camarone-700">Remember Me</x-radix.label>
                    </div>

                    @error('login_error')
                        <x-radix.alert variant="destructive">
                            <x-radix.alert-icon />
                            <x-radix.alert-content>
                                <x-radix.alert-description>{{ $message }}</x-radix.alert-description>
                            </x-radix.alert-content>
                        </x-radix.alert>
                    @enderror

                    <div class="flex items-center justify-end mt-4">
                        <x-radix.button variant="ghost" as-child>
                            <a class="underline text-sm text-camarone-600 hover:text-camarone-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-camarone-500"
                               href="{{ route('register') }}">
                                Don't have an account?
                            </a>
                        </x-radix.button>

                        <x-radix.button type="submit" class="auth-button auth-button-primary ml-4">
                            Login
                        </x-radix.button>
                    </div>
                </form>
            </x-radix.card-content>
        </x-radix.card>
    </div>
</main>

</body>
</html>
