<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-image">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-lg">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <x-radix.card class="p-8 rounded-lg shadow-md w-full sm:max-w-md mt-6 bg-white border border-camarone-200">
            <x-radix.card-header>
                <x-radix.card-title class="text-3xl font-bold text-center text-camarone-800 mb-8">
                    Register Here
                </x-radix.card-title>
            </x-radix.card-header>

            <x-radix.card-content>
                <form action="{{ route('register') }}" method="POST" class="space-y-4">
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

                    <!-- Phone Number -->
                    <div>
                        <x-radix.label for="contact_number" class="block mb-2 text-sm font-medium text-camarone-700">Phone Number</x-radix.label>
                        <x-radix.text-field>
                            <x-radix.text-field-input 
                                id="contact_number" 
                                type="text" 
                                name="contact_number" 
                                value="{{ old('contact_number') }}"
                                placeholder="09091234567"
                                class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900" />
                        </x-radix.text-field>
                        @error('contact_number')
                        <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-radix.label for="email" class="block mb-2 text-sm font-medium text-camarone-700">Email</x-radix.label>
                        <x-radix.text-field>
                            <x-radix.text-field-input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900" />
                        </x-radix.text-field>
                        @error('email')
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

                    <!-- Confirm Password -->
                    <div>
                        <x-radix.label for="password_confirmation" class="block mb-2 text-sm font-medium text-camarone-700">Confirm Password</x-radix.label>
                        <x-radix.text-field>
                            <x-radix.text-field-input 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900" />
                        </x-radix.text-field>
                        @error('password_confirmation')
                        <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-radix.button variant="ghost" as-child>
                            <a class="underline text-sm text-camarone-600 hover:text-camarone-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-camarone-500"
                               href="{{ route('login') }}">
                                Already registered?
                            </a>
                        </x-radix.button>

                        <x-radix.button type="submit" class="auth-button auth-button-primary ml-4">
                            Register
                        </x-radix.button>
                    </div>
                </form>
            </x-radix.card-content>
        </x-radix.card>
    </div>
</main>

</body>
</html>
