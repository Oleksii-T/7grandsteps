@php
    $includeQueryParams = isset($includeQueryParams) ? $includeQueryParams : [];
@endphp

<section class="category-posts" aria-label="News posts">
    <div class="news-feed category-news-feed">
        @forelse ($posts as $post)
            <article class="news-row card">
                <a class="news-thumb image-wrap" href="{{ route('posts.show', $post) }}" aria-label="{{ $post->title }}">
                    <img src="{{ $post->thumbnail() ? $post->thumbnail()->url : asset('images/empty.png') }}" alt="{{ $post->title }}" loading="lazy">
                </a>
                <div class="news-content">
                    <p class="news-meta">Updated • {{ $post->updated_at->diffForHumans() }}</p>
                    <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                    @if ($post->intro_cropped)
                        <p>{{ $post->intro_cropped }}</p>
                    @endif
                </div>
            </article>
        @empty
            <p class="category-empty">No posts found for this filter.</p>
        @endforelse
    </div>
</section>

@if ($posts->hasPages())
    <section class="category-pagination" aria-label="Pagination">
        {!! $posts->links('vendor.pagination.model-posts', compact('model', 'includeQueryParams')) !!}
    </section>
@endif
