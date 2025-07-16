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
        <div class="p-8 rounded-lg shadow-md w-full sm:max-w-md mt-6 bg-white border border-camarone-200">

            <h2 class="text-3xl font-bold text-center text-camarone-800 mb-8">
                Welcome Gardeners!
            </h2>

            <form action="{{ route('login') }}" method="POST">
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

                <!-- Remember Me -->
                <div class="mb-4">
                    <input id="remember" type="checkbox" name="remember">
                    <label for="remember" class="text-sm text-camarone-700">Remember Me</label>
                </div>

                @error('login_error')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-camarone-600 hover:text-camarone-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-camarone-500"
                       href="{{ route('register') }}">
                        Don't have an account?
                    </a>

                    <button type="submit"
                            class="auth-button auth-button-primary ml-4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</body>
</html>
