@props(['posts'])

@foreach ($posts as $post)
    <article class="blog-post-card mb-8">
        <h2 class="blog-post-title">{{ $post->title }}</h2>

        @if($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
        @endif

        @if($post->excerpt)
            <p class="text-camarone-600 mb-4 font-medium">{{ $post->excerpt }}</p>
        @endif

        <div class="blog-post-body">{{ $post->body }}</div>

        <div class="blog-post-meta">
            <span class="blog-post-date">{{ $post->created_at->diffForHumans() }}</span>
            <span class="blog-post-author">{{ $post->user->username }}</span>
        </div>

        <div class="mt-4">
            <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-camarone-600 hover:text-camarone-700 font-semibold transition-colors duration-200">
                Read more
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </article>
@endforeach
