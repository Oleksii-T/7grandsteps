@extends('layouts.app')

@section('content')
  <main id="main-content" class="container main-layout">
    <section class="latest" aria-labelledby="latest-heading">
      <header class="section-header">
        <h1 id="latest-heading">Checkpoint Daily</h1>
        <p>Games, culture, releases, and industry shifts worth your attention.</p>
      </header>

      <section class="hero-categories" aria-labelledby="categories-heading">
        <div class="hero-mosaic">
          <article class="mosaic-card mosaic-card-industry">
            <div class="mosaic-card-copy">
              <span class="category-badge">Industry</span>
              <h3>Strategy shifts, studio bets, and the business stories defining the year.</h3>
              <p>The biggest industry moves rarely look dramatic at first. We track the deals, resets, and executive calls that change what gets made next.</p>
            </div>
            <div class="mosaic-card-rail">
              <p class="mosaic-label">Latest News</p>
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
            <span class="category-badge">PC</span>
            <h3>Performance, mods, ports, and the configuration wars.</h3>
            <p class="mosaic-label">Latest News</p>
            <ul class="title-list">
                @foreach ($latestPcNews as $post)
                    <li><a href="{{route('posts.show', $post)}}">{{Str::limit($post->title, 55, '...')}}</a></li>
                @endforeach
            </ul>
          </article>

          <article class="mosaic-card mosaic-card-xbox">
            <span class="category-badge">Xbox</span>
            <h3>Game Pass pressure, platform pacing, and the long view.</h3>
            <p class="mosaic-label">Latest News</p>
            <ul class="arrow-list">
                @foreach ($latestXboxNews as $post)
                    <li><a href="{{route('posts.show', $post)}}">{{Str::limit($post->title, 55, '...')}}</a></li>
                @endforeach
            </ul>
          </article>

          <article class="mosaic-card mosaic-card-playstation">
            <span class="category-badge">PlayStation</span>
            <h3>Prestige releases, ecosystem updates, and audience retention.</h3>
            <p class="mosaic-label">Latest News</p>
            <ul class="dated-list">
                @foreach ($latestPsNews as $post)
                    <li><span>{{$post->published_at->format('M d')}}</span><a href="{{route('posts.show', $post)}}">{{Str::limit($post->title, 80, '...')}}</a></li>
                @endforeach
            </ul>
          </article>

          <a href="{{route('categories.show', $newsCategory)}}" class="mosaic-card mosaic-card-allnews">
            <span class="mosaic-allnews-eyebrow">Archive</span>
            <span class="mosaic-card-allnews-title">
              <strong>See All News</strong>
              <span class="mosaic-card-allnews-icon" aria-hidden="true">&rarr;</span>
            </span>
            <span>Jump to the full stream of headlines, updates, reviews, and platform coverage.</span>
          </a>
        </div>
      </section>

      <section class="content-block" aria-labelledby="about-heading">
        <h2 id="about-heading" class="subheading">About Us</h2>
        <p>
          Checkpoint Daily is an independent game publication covering launches, esports, platform updates, and long-form analysis.
          We focus on accurate reporting, clean writing, and practical player-focused context.
        </p>
      </section>

      <section class="content-block" aria-labelledby="features-heading">
        <h2 id="features-heading" class="subheading">Features</h2>
        <ul class="feature-list">
          <li>Daily headline digest across PC, console, and mobile.</li>
          <li>Weekend deep dives into design, balance, and monetization trends.</li>
          <li>Hands-on previews and benchmark-backed hardware guides.</li>
        </ul>
      </section>

      <section class="content-block" aria-labelledby="authors-heading">
        <h2 id="authors-heading" class="subheading">Authors</h2>
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
        <h2 id="contact-heading" class="subheading">Contact</h2>
        <p>For press inquiries, story tips, partnerships, or corrections, visit our dedicated contact page.</p>
        <p><a class="contact-link" href="{{route('contact-us')}}">Go to Contact Us page</a></p>
      </section>
    </section>

    <section class="discover" aria-labelledby="discover-heading">
      <header class="section-header">
        <h2 id="discover-heading">Latest News</h2>
        <p>Live updates and editor picks covering the stories shaping the week.</p>
      </header>

      <section class="news-feed" aria-labelledby="feed-heading">
        @foreach ($latestNews as $post)
            <article class="news-row card">
            <a class="news-thumb image-wrap" href="{{route('posts.show', $post)}}" aria-label="{{ $post->title }}">
              <img src="{{ $post->thumbnail() ? $post->thumbnail()->url : asset('images/empty.png') }}" alt="{{ $post->title }}" loading="lazy">
            </a>
            <div class="news-content">
                <p class="news-meta">Updated • {{$post->updated_at->diffForHumans()}}</p>
                <h3><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></h3>
                {{-- <p>Developers rolled out emergency queue protections and promised compensation packs for affected players.</p> --}}
            </div>
            </article>
        @endforeach
        <a href="{{route('categories.show', $newsCategory)}}" class="news-feed-allnews" aria-label="See all news">
          <span class="news-feed-allnews-label">See All News</span>
          <span class="news-feed-allnews-icon" aria-hidden="true">&rarr;</span>
        </a>
      </section>
    </section>
  </main>
@endsection
