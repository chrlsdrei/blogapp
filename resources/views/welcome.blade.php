<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Your Garden</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-color-camarone-50 text-camarone-900">
    <!-- Hero Section -->
    <section class="min-h-screen flex flex-col justify-center items-center px-8 bg-image">
        <div class="text-center max-w-4xl">
            <h1 class="text-6xl font-bold mb-6 text-camarone-800 leading-tight text-stroke-camarone-100">
                Blog Your Garden
            </h1>
            <p class="text-xl font-bold text-camarone-200 leading-relaxed max-w-3xl mx-auto text-stroke-camarone-950">
                Share what you've built, connect with people, trade pets and fruits, make new friends, all in one in a single platform
            </p>
        </div>
    </section>

    <!-- First Blog Post Section -->
    <section class="py-20 px-8 bg-camarone-50">
        <div class="max-w-7xl mx-auto flex items-center gap-16">
            <!-- Blog Post Card -->
            <div class="flex-1">
                <div class="blog-post-card">
                    <h3 class="blog-post-title">Getting Started with Your Garden Journey</h3>
                    <p class="blog-post-body">
                        Welcome to the amazing world of garden building! This is where your creativity meets nature,
                        and every seed you plant tells a story. From choosing the perfect flowers to designing
                        intricate layouts, your garden is a reflection of your unique style and personality.
                        Join thousands of gardeners who share their progress, tips, and beautiful creations daily.
                    </p>
                    <div class="blog-post-meta">
                        <span class="blog-post-date">July 15, 2025</span>
                        <span class="blog-post-author">By Garden Master</span>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="flex-1">
                <h2 class="text-3xl font-bold text-camarone-800 mb-4">
                    Share Your Progress
                </h2>
                <p class="text-lg text-camarone-700 leading-relaxed">
                    This platform is for sharing your progress in grow a garden. A popular roblox game
                    played by millions of people.
                </p>
            </div>
        </div>
    </section>

    <!-- Second Blog Post Section -->
    <section class="py-20 px-8 bg-camarone-100">
        <div class="max-w-7xl mx-auto flex items-center gap-16">
            <!-- Text Content -->
            <div class="flex-1">
                <h2 class="text-3xl font-bold text-camarone-800 mb-4">
                    Join Our Community
                </h2>
                <p class="text-lg text-camarone-700 leading-relaxed">
                    Register and Login now to connect with your fellow gardeners.
                </p>
            </div>

            <!-- Blog Post Card -->
            <div class="flex-1">
                <div class="blog-post-card">
                    <h3 class="blog-post-title">Connect with Fellow Gardeners</h3>
                    <p class="blog-post-body">
                        Building a garden is more fun when shared with friends! Our community is filled with
                        passionate gardeners ready to help, trade, and celebrate your achievements. Whether
                        you're looking for rare seeds, want to showcase your latest creation, or need advice
                        on garden design, you'll find supportive friends here who share your passion for growing.
                    </p>
                    <div class="blog-post-meta">
                        <span class="blog-post-date">July 16, 2025</span>
                        <span class="blog-post-author">By Community Team</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 px-8 bg-camarone-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-camarone-800 mb-8">
                Ready to Start Your Garden Journey?
            </h2>
            <div class="flex gap-6 justify-center">
                <a href="{{ route('register') }}" class="auth-button auth-button-primary">
                    Register Now
                </a>
                <a href="{{ route('login') }}" class="auth-button auth-button-secondary">
                    Login
                </a>
            </div>
        </div>
    </section>
</body>
</html>
