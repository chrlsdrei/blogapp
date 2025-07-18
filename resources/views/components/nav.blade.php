<header>
    <nav class="bg-camarone-800 text-camarone-50 p-4">
        <div class="flex justify-between items-center">
            <!-- Left side - Home link -->
            @guest
            <div>
                <a href="{{ route('welcome') }}"
                   class="text-2xl font-bold transition duration-150 hover:text-camarone-200">Home</a>
            </div>
            @endguest
            @auth
            <div>
                <a href="{{ route('home') }}"
                   class="text-2xl font-bold transition duration-150 hover:text-camarone-200">Home</a>
            </div>
            @endauth

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
                        <a href="{{ route('profile') }}" class="block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150">View Profile</a>
                        <a href="{{ route('create-post') }}" class="block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150">Create Post</a>
                        <a href="{{ route('home') }}" class="block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150">My Posts</a>
                        <a href="{{ route('profile') }}" class="block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150">Edit Profile</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="w-full text-left block hover:bg-camarone-100 px-4 py-2 text-camarone-700 transition duration-150 cursor-pointer">Logout</button>
                        </form>
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

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown');
        if (!dropdown) return;

        const button = event.target.closest('.round-btn');

        if (!button && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
