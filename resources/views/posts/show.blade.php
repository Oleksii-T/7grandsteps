@extends('layouts.app')

@section('title', $post->meta_title)
@section('description', $post->meta_description)
@section('meta-image', $post->thumbnail()?->url)
@section('meta-type', 'article')
@section('meta')
    <meta property="article:published_time" content="{{$post->published_at?->toIso8601ZuluString()}}"/>
    <meta property="article:modified_time" content="{{$post->updated_at->toIso8601ZuluString()}}"/>
    <meta property="article:section" content="{{$category->name}}"/>
    <meta property="article:author" content="{{$author->name}}"/>
@endsection

@section('content')
    @php
        $authorAvatar = $author?->avatar();
        $thumbnail = $post->thumbnail();
    @endphp

    <main class="post-page">
        <span data-sendview="{{ route('posts.view', $post) }}"></span>
        @if ($post->status == \App\Enums\PostStatus::DRAFT)
            <p class="admin-only-post">The post is {{ $post->status->readable() }}. Only admin can see it.</p>
        @endif

        <section class="post-hero">
            <h1>{{ $post->title }}</h1>
            <div class="post-meta">
                @if ($author)
                    <div class="author-block">
                        <img src="{{ $authorAvatar ? $authorAvatar->url : asset('images/empty.png') }}" class="lazyload" alt="{{ $authorAvatar?->alt ?: $author->name }}" title="{{ $authorAvatar?->title ?: $author->name }}">
                        <div>
                            <span class="author-name">By {{ $author->name }}</span>
                            @if ($author->title)
                                <span class="author-role">{{ $author->title }}</span>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="post-date">Last updated: {{ $post->updated_at->format('M d, Y') }}</div>
            </div>
        </section>

        <section class="post-layout">
            <article class="post-main">
                @if ($thumbnail)
                    <img class="post-thumb lazyload" src="{{ $thumbnail->url }}" alt="{{ $thumbnail->alt }}" title="{{ $thumbnail->title }}" />
                @endif
                @foreach ($blockGroups as $blocks)
                    <x-content-blocks :blocks="$blocks" />
                @endforeach
            </article>

            @if ($otherPostsFromCategory->isNotEmpty())
                <aside class="post-aside">
                    <h3>Other News</h3>
                    <div class="news-list">
                        @foreach ($otherPostsFromCategory as $otherPost)
                            @php
                                $otherThumbnail = $otherPost->thumbnail();
                            @endphp
                            <a href="{{ route('posts.show', $otherPost) }}" class="news-card">
                                @if ($otherThumbnail)
                                    <img class="post-thumb lazyload" src="{{ $otherThumbnail->url }}" alt="{{ $otherThumbnail->alt }}" title="{{ $otherThumbnail->title }}" />
                                @else
                                    <img class="post-thumb lazyload" src="{{ asset('images/empty.png') }}" alt="{{ $otherPost->title }}" title="{{ $otherPost->title }}" />
                                @endif
                                <div>
                                    <p>{{ $otherPost->title }}</p>
                                    <span>{{ $otherPost->published_at->format('M d, Y') }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </aside>
            @endif
        </section>
    </main>
@endsection
