@extends('layouts.app')

@section('content')
  <main id="main-content" class="container contact-page">
    <div class="contact-layout">
      <section class="contact-primary" aria-label="Contact form">
        <section class="content-block contact-form-block" aria-labelledby="contact-page-heading">
          <h1 id="contact-page-heading" class="subheading">{{$page->show('header:title')}}</h1>
          <p>{{$page->show('header:text')}}</p>

          <form class="contact-form" action="#" method="post">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" autocomplete="name" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" autocomplete="email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">{{$page->show('form:cta')}}</button>
          </form>
        </section>
      </section>

      <aside class="contact-sidebar" aria-label="Contact details and response times">
        <section class="content-block" aria-labelledby="offer-heading">
          <h2 id="offer-heading" class="subheading">{{$page->show('we-offer:title')}}</h2>
          <p class="contact-section-subtitle">{{$page->show('we-offer:sub-title')}}</p>

          <div class="contact-offer-grid">
            <article class="contact-offer-card">
              <span class="contact-offer-icon" aria-hidden="true">&#9998;</span>
              <h3>{{$page->show('we-offer:card-1-title')}}</h3>
              <p>{{$page->show('we-offer:card-1-text')}}</p>
            </article>

            <article class="contact-offer-card">
              <span class="contact-offer-icon" aria-hidden="true">&#128483;</span>
              <h3>{{$page->show('we-offer:card-2-title')}}</h3>
              <p>{{$page->show('we-offer:card-2-text')}}</p>
            </article>

            <article class="contact-offer-card">
              <span class="contact-offer-icon" aria-hidden="true">&#129309;</span>
              <h3>{{$page->show('we-offer:card-3-title')}}</h3>
              <p>{{$page->show('we-offer:card-3-text')}}</p>
            </article>

            <article class="contact-offer-card">
              <span class="contact-offer-icon" aria-hidden="true">&#128161;</span>
              <h3>{{$page->show('we-offer:card-4-title')}}</h3>
              <p>{{$page->show('we-offer:card-4-text')}}</p>
            </article>
          </div>
        </section>

        <section class="content-block" aria-labelledby="wait-heading">
          <h2 id="wait-heading" class="subheading">{{$page->show('wait:title')}}</h2>
          {!! $page->show('wait:content') !!}
        </section>
      </aside>
    </div>
  </main>
@endsection


@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.public_key')}}"></script>
@endsection
