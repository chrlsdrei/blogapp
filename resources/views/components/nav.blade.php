<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-camarone-50 min-h-screen">
    <header>
        <nav class="bg-camarone-800 text-white p-4">
            <ul class="flex space-x-4">
                <li><a href="{{ route('welcome') }}"
                       class="transition duration-150 hover:text-camarone-200">Home</a></li>
                <li><a href="{{ route('register') }}"
                       class="transition duration-150 hover:text-camarone-200">Register</a></li>
                <li><a href="{{ route('login') }}"
                       class="transition duration-150 hover:text-camarone-200">Login</a></li>
            </ul>
        </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-lg">
        {{ $slot }}
    </main>
</body>
</html>
