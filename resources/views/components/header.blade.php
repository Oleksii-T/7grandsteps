<header class="site-header">
  <div class="container nav-wrap">
    <a class="logo" href="{{ route('index') }}" aria-label="7grandsteps home">
      <img src="{{ asset('images/logo-t.png') }}" alt="7grandsteps">
    </a>

    <nav class="top-nav" aria-label="Primary">
      <ul>
        @foreach ($topTags->take(7) as $tag)
          <li>
            <a class="{{request()->tag == $tag->slug ? 'selected' : ''}}" href="{{route('categories.show', ['news', $tag->slug])}}">{{$tag->name}}</a>
          </li>
        @endforeach
      </ul>
    </nav>

    <button class="search-btn" type="button" aria-label="Search game news">
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M10.5 3a7.5 7.5 0 0 1 5.9 12.1l4.2 4.2-1.4 1.4-4.2-4.2A7.5 7.5 0 1 1 10.5 3Zm0 2a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11Z" fill="currentColor"/>
      </svg>
    </button>
  </div>
</header>
