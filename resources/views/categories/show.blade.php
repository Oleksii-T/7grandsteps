@extends('layouts.app')

@section('title', ($game ? "Latest News on $game->name" : $category->meta_title) . ($currentPage != 1 ? " - Page $currentPage" : ''))
@section('description', ($game ? "Read the most authoritative and fresh news about the $game->name!" : $category->meta_description) . ($currentPage != 1 ? " | Page $currentPage" : ''))
@section('meta-image', $category->meta_thumbnail()?->url)
@if ($currentPage != 1)
    @section('meta-canonical', $category->paginationLink(1, ['game']))
@endif

@section('content')
    <main class="category-page">
        <section class="category-intro">
            <header class="section-header">
                <h1>{{ $game ? "Latest News on $game->name" : $category->name }}</h1>
                <p class="category-subtitle">
                    {{ $game ? "Fresh updates, analysis, and guides for $game->name." : ($category->description ?: 'Latest updates and editor picks from this category.') }}
                </p>
            </header>

            @if ($topTags->isNotEmpty())
                <ul class="category-tags" aria-label="Browse by tag">
                    <li>
                        <a class="{{ $tagSlug ? '' : 'selected' }}" href="{{ $category->paginationLink(1, ['game', 'search']) }}">All</a>
                    </li>
                    @foreach ($topTags as $tag)
                        <li>
                            <a class="{{ $tagSlug == $tag->slug ? 'selected' : '' }}" href="{{route('categories.show', ['news', $tag->slug])}}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>

        <div class="pagination-content">
            @include('components.category-posts-with-pages', [
                'posts' => $posts,
                'model' => $category,
                'includeQueryParams' => ['game','tagSlug', 'search'],
            ])
        </div>
    </main>
@endsection
