<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-image">
    <header>
        <nav class="bg-camarone-800 text-white p-4">
            <div class="flex justify-between items-center">
                <!-- Left side - Home link -->
                <div>
                    <a href="{{ route('welcome') }}"
                       class="transition duration-150 hover:text-camarone-200">Home</a>
                </div>

                <!-- Right side - Auth section -->
                <div>
                    @auth
                    <div class="relative">
                        <button type="button" class="round-btn bg-camarone-600 text-white p-2 rounded-full hover:bg-camarone-700 transition duration-150" onclick="toggleDropdown()">
                            <img src="https://picsum.photos/id/237/200/300" alt="User Avatar" class="w-8 h-8 rounded-full object-cover">
                        </button>

                        <div id="dropdown" class="hidden bg-camarone-50 shadow-lg absolute top-12 right-0 rounded-lg overflow-hidden font-light min-w-48 z-50">
                            <div class="px-4 py-2 border-b border-camarone-200">
                                <p class="text-camarone-800 font-medium">{{ auth()->user()->username }}</p>
                            </div>
                            <a href="#" class="block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150">Dashboard</a>
                            <a href="#" class="block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150">Profile</a>
                            <div class="border-t border-camarone-200">
                            </div>
                        </div>
                    </div>
                    @endauth

                    @guest
                    <div class="flex items-center gap-4">
                        <a href="{{ route('register') }}"
                           class="transition duration-150 hover:text-camarone-200">Register</a>
                        <a href="{{ route('login') }}"
                           class="transition duration-150 hover:text-camarone-200">Login</a>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-lg">
        {{ $slot }}
    </main>
</body>
</html>
