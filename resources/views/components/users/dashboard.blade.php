<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-image">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-lg">
    <h1 class="text-4xl font-bold text-camarone-800 mb-4">Hello {{auth()->user()->username}}!</h1>
    <p class="text-lg text-camarone-700">Welcome to your dashboard!</p>
</main>

</body>
</html>
