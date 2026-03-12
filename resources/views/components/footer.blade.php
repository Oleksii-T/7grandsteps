<footer class="site-footer">
  <div class="container footer-wrap">
    <div class="footer-main">
      <p class="footer-about">{{$footer->show('text')}}</p>
      <nav aria-label="Footer">
        <ul class="footer-links">
          <li><a href="{{ route('about-us') }}">About</a></li>
          <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
          <li><a href="{{ route('terms') }}">Terms of Service</a></li>
          <li><a href="{{ route('cookiePolicy') }}">Cookies Policy</a></li>
        </ul>
      </nav>
      <p class="footer-copy">© {{date('Y')}} 7grandsteps. All rights reserved.</p>
    </div>
    <a class="footer-logo" href="{{ route('index') }}" aria-label="7grandsteps logo">
      <img src="{{ asset('images/logo-t.png') }}" alt="7grandsteps logo">
    </a>
  </div>
</footer>
