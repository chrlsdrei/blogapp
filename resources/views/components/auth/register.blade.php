<x-nav>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-camarone-50">

        <div class="p-8 rounded-lg shadow-md w-full sm:max-w-md mt-6 bg-white border border-camarone-200">

            <h2 class="text-3xl font-bold text-center text-camarone-800 mb-8">
                Register Here
            </h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block mb-2 text-sm font-medium text-camarone-700">Username</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}"
                           placeholder="Enter your username"
                           class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900">
                           @error('username')
                           <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                           @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="contact_number" class="block mb-2 text-sm font-medium text-camarone-700">Phone Number</label>
                    <input id="contact_number" type="text" name="contact_number" value="{{ old('contact_number') }}"
                           placeholder="09091234567"
                           class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900">
                    @error('contact_number')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-camarone-700">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email') }}"
                           placeholder="you@example.com"
                           class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900">
                    @error('email')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-camarone-700">Password</label>
                    <input id="password" type="password" name="password"
                           placeholder="Enter your password"
                           class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900">
                    @error('password')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-camarone-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           placeholder="Confirm your password"
                           class="input w-full px-3 py-2 border border-camarone-300 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-camarone-500 focus:border-camarone-500 bg-white text-camarone-900">
                    @error('password_confirmation')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-camarone-600 hover:text-camarone-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-camarone-500"
                       href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit"
                            class="auth-button auth-button-primary ml-4">
                        Register
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>
</x-nav>
