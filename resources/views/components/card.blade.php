@props(['posts'])

@foreach ($posts as $post)
    <x-radix.card class="blog-post-card mb-8">
        <x-radix.card-header>
            <x-radix.card-title class="blog-post-title">{{ $post->title }}</x-radix.card-title>
        </x-radix.card-header>

        <x-radix.card-content>
            @if($post->description)
                <div class="bg-camarone-100 p-4 rounded-lg mb-4">
                    <p class="text-camarone-700 font-medium">{{ $post->description }}</p>
                </div>
                <div class="blog-post-body">{{ Str::limit($post->body, 150, '...') }}</div>
            @else
                <div class="blog-post-body">{{ Str::limit($post->body, 300, '...') }}</div>
            @endif

            <div class="blog-post-meta">
                <span class="blog-post-date">{{ $post->created_at->diffForHumans() }}</span>
                <span class="blog-post-author">{{ $post->user->username }}</span>
            </div>
        </x-radix.card-content>

        <x-radix.card-footer>
            <div class="mt-4 flex items-center justify-between">
                <x-radix.button variant="ghost" as-child>
                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-camarone-600 hover:text-camarone-700 font-semibold transition-colors duration-200">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </x-radix.button>

                @auth
                    @if(auth()->user()->id === $post->user_id && request()->routeIs('profile'))
                        <div class="flex items-center gap-2">
                            <x-radix.button variant="ghost" size="sm" as-child>
                                <a href="{{ route('posts.edit', $post->slug) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-camarone-600 hover:text-camarone-700 hover:bg-camarone-50 rounded-lg transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Update
                                </a>
                            </x-radix.button>
                            
                            <button type="button" 
                                    onclick="confirmDelete('{{ $post->slug }}')"
                                    class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </div>
                    @endif
                @endauth
            </div>
        </x-radix.card-footer>
    </x-radix.card>
@endforeach

<script>
    function confirmDelete(postSlug) {
        if (confirm('Are you sure you want to delete this post? This action cannot be undone.')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/posts/${postSlug}`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            const redirectField = document.createElement('input');
            redirectField.type = 'hidden';
            redirectField.name = 'redirect_back';
            redirectField.value = window.location.href;
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            form.appendChild(redirectField);
            
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
