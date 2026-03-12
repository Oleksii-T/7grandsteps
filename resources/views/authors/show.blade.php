@extends('layouts.app')

@section('title', $author->meta_title)
@section('description', $author->meta_description)
@section('meta-image', $author->meta_thumbnail()?->url)

@section('content')
    @php
        $avatar = $author->avatar();
    @endphp

    <main class="author-page">
        <section class="post-hero author-hero">
            <div class="post-meta">
                <div class="author-block">
                    <img src="{{ $avatar ? $avatar->url : asset('images/empty.png') }}" class="lazyload" alt="{{ $avatar?->alt ?: $author->name }}" title="{{ $avatar?->title ?: $author->name }}">
                    <div>
                        <h1>{{ $author->name }}</h1>
                        @if ($author->title)
                            <span class="author-role">{{ $author->title }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="page-with-blocks-content">
            <x-content-blocks :blocks="$blocks" type="1" />
        </section>
    </main>
@endsection
