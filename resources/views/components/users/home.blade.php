<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} - Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen bg-camarone-100">

<x-nav />

<main class="py-8 px-4 mx-auto max-w-4xl">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-camarone-800 mb-4">Hello {{auth()->user()->username}}!</h1>
        <p class="text-lg text-camarone-700">Welcome to your blog dashboard!</p>
    </div>

    <div class="grid gap-8 grid-cols-1">
        <x-card :posts="$posts" />
    </div>

</main>

<div class="mt-8 bg-camarone-50 p-4 rounded-lg shadow-md">
    {{ $posts->links() }}
</div>

</body>
</html>
