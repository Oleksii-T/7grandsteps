<header class="site-header">
  <div class="container nav-wrap">
    <a class="logo" href="{{ route('index') }}" aria-label="7grandsteps home">
      <img src="{{ asset('images/logo-t.png') }}" alt="7grandsteps">
    </a>

    <nav class="top-nav" aria-label="Primary">
      <ul>
        <li>
          <a href="{{route('categories.show', 'news')}}">News</a>
        </li>
        @foreach ($topTags->take(6) as $tag)
          <li>
            <a class="{{request()->tag == $tag->slug ? 'selected' : ''}}" href="{{route('categories.show', ['news', $tag->slug])}}">{{$tag->name}}</a>
          </li>
        @endforeach
      </ul>
    </nav>

    <form action="{{ route('categories.show', 'news') }}" class="search">
      <input type="text" placeholder="Search..." name="search" value="{{ request()->search }}" />
      @if (request()->search)
        <button name="search" value="" class="icon" type="submit" aria-label="Clear search">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </button>
      @else
        <svg width="18" height="18" viewBox="0 0 24 24" class="icon" aria-hidden="true" focusable="false">
          <path d="M11 3a8 8 0 0 1 6.35 12.88l3.38 3.38-1.42 1.42-3.38-3.38A8 8 0 1 1 11 3Zm0 2a6 6 0 1 0 0 12 6 6 0 0 0 0-12Z" />
        </svg>
      @endif
    </form>
  </div>
</header>
