@extends('layouts.app')

@section('content')
  <main id="main-content" class="container main-layout">
    <section class="latest" aria-labelledby="latest-heading">
      <header class="section-header">
        <h1 id="latest-heading">{{$page->show('hero-section:title')}}</h1>
        <p>{{$page->show('hero-section:sub-title')}}</p>
      </header>

      <section class="hero-categories" aria-labelledby="categories-heading">
        <div class="hero-mosaic">
          <article class="mosaic-card mosaic-card-industry">
            <div class="mosaic-card-copy">
              <span class="category-badge">{{$page->show('hero-section:category-1-name')}}</span>
              <h3>{{$page->show('hero-section:category-1-title')}}</h3>
              <p>{{$page->show('hero-section:category-1-text')}}</p>
            </div>
            <div class="mosaic-card-rail">
              <p class="mosaic-label">{{$page->show('hero-section:latest-news')}}</p>
              @foreach ($latestIndustryNews as $post)
                <a href="{{route('posts.show', $post)}}" class="thumb-story">
                  <img
                    class="thumb-story-image"
                    src="{{ $post->thumbnail() ? $post->thumbnail()->url : asset('images/empty.png') }}"
                    alt="{{ $post->title }}"
                    title="{{ $post->title }}"
                  >
                  <span class="thumb-story-copy">
                      <strong>{{Str::limit($post->title, 55, '...')}}</strong>
                      <span>{{$post->published_at->diffForHumans()}}</span>
                  </span>
                </a>
              @endforeach
            </div>
          </article>

          <article class="mosaic-card mosaic-card-pc">
            <span class="category-badge">{{$page->show('hero-section:category-2-name')}}</span>
            <h3>{{$page->show('hero-section:category-2-title')}}</h3>
            <p class="mosaic-label">{{$page->show('hero-section:latest-news')}}</p>
            <ul class="title-list">
                @foreach ($latestPcNews as $post)
                    <li><a href="{{route('posts.show', $post)}}">{{Str::limit($post->title, 55, '...')}}</a></li>
                @endforeach
            </ul>
          </article>

          <article class="mosaic-card mosaic-card-xbox">
            <span class="category-badge">{{$page->show('hero-section:category-3-name')}}</span>
            <h3>{{$page->show('hero-section:category-3-title')}}</h3>
            <p class="mosaic-label">{{$page->show('hero-section:latest-news')}}</p>
            <ul class="arrow-list">
                @foreach ($latestXboxNews as $post)
                    <li><a href="{{route('posts.show', $post)}}">{{Str::limit($post->title, 55, '...')}}</a></li>
                @endforeach
            </ul>
          </article>

          <article class="mosaic-card mosaic-card-playstation">
            <span class="category-badge">{{$page->show('hero-section:category-4-name')}}</span>
            <h3>{{$page->show('hero-section:category-4-title')}}</h3>
            <p class="mosaic-label">{{$page->show('hero-section:latest-news')}}</p>
            <ul class="dated-list">
                @foreach ($latestPsNews as $post)
                    <li><span>{{$post->published_at->format('M d')}}</span><a href="{{route('posts.show', $post)}}">{{Str::limit($post->title, 80, '...')}}</a></li>
                @endforeach
            </ul>
          </article>

          <a href="{{route('categories.show', $newsCategory)}}" class="mosaic-card mosaic-card-allnews">
            <span class="mosaic-allnews-eyebrow">{{$page->show('hero-section:see-all-budge')}}</span>
            <span class="mosaic-card-allnews-title">
              <strong>{{$page->show('hero-section:see-all-link')}}</strong>
              <span class="mosaic-card-allnews-icon" aria-hidden="true">&rarr;</span>
            </span>
            <span>{{$page->show('hero-section:see-all-text')}}</span>
          </a>
        </div>
      </section>

      <section class="content-block" aria-labelledby="about-heading">
        <h2 id="about-heading" class="subheading">{{$page->show('about-us-section:title')}}</h2>
        {!! $page->show('about-us-section:content') !!}
      </section>

      <section class="content-block" aria-labelledby="features-heading">
        <h2 id="features-heading" class="subheading">{{$page->show('features-section:title')}}</h2>
        {!! $page->show('features-section:content') !!}
      </section>

      <section class="content-block" aria-labelledby="authors-heading">
        <h2 id="authors-heading" class="subheading">{{$page->show('authors-section:title')}}</h2>
        {!! $page->show('authors-section:content') !!}
        <div class="authors-list">
          @foreach ($authors as $author)
            <article class="author-card">
                <a href="{{ route('authors.show', $author) }}">
                    <img src="{{$author->avatar()->url}}" alt="{{$author->avatar()->alt}}" title="{{$author->avatar()->title}}">
                </a>
                <div>
                <a href="{{ route('authors.show', $author) }}">
                    <h3>{{$author->name}}</h3>
                </a>
                <p>{{$author->title}}</p>
                </div>
            </article>
          @endforeach
        </div>
      </section>

      <section class="content-block" aria-labelledby="contact-heading">
        <h2 id="contact-heading" class="subheading">{{$page->show('contact-section:title')}}</h2>
        {!! $page->show('contact-section:content') !!}
        <p><a class="contact-link" href="{{route('contact-us')}}">{{$page->show('contact-section:cta')}}</a></p>
      </section>
    </section>

    <section class="discover" aria-labelledby="discover-heading">
      <header class="section-header">
        <h2 id="discover-heading">{{$page->show('latest-news-section:title')}}</h2>
        <p>{{$page->show('latest-news-section:sub-title')}}</p>
      </header>

      <section class="news-feed" aria-labelledby="feed-heading">
        @foreach ($latestNews as $post)
            <article class="news-row card">
            <a class="news-thumb image-wrap" href="{{route('posts.show', $post)}}" aria-label="{{ $post->title }}">
              <img src="{{ $post->thumbnail() ? $post->thumbnail()->url : asset('images/empty.png') }}" alt="{{ $post->title }}" loading="lazy">
            </a>
            <div class="news-content">
                <p class="news-meta">{{$page->show('latest-news-section:updated')}} • {{$post->updated_at->diffForHumans()}}</p>
                <h3><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></h3>
                {{-- <p>Developers rolled out emergency queue protections and promised compensation packs for affected players.</p> --}}
            </div>
            </article>
        @endforeach
        <a href="{{route('categories.show', $newsCategory)}}" class="news-feed-allnews" aria-label="See all news">
          <span class="news-feed-allnews-label">{{$page->show('latest-news-section:see-all-news')}}</span>
          <span class="news-feed-allnews-icon" aria-hidden="true">&rarr;</span>
        </a>
      </section>
    </section>
  </main>
@endsection
