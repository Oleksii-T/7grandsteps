@extends('layouts.app')

@section('content')
  <main id="main-content" class="container contact-page">
    <div class="contact-layout">
      <section class="contact-primary" aria-label="Contact form">
        <section class="content-block contact-form-block" style="margin-bottom: 1rem">
          <h1 id="contact-page-heading" class="subheading">{{$page->show('header:title')}}</h1>
          {!! $page->show('header:text') !!}

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
          <section class="content-block">
            {!! $page->show('wait:content') !!}
          </section>
      </section>

      <aside class="contact-sidebar" aria-label="Contact details and response times">
        @foreach ($blocks as $block)
          <section class="content-block">
            <x-content-blocks :blocks="[$block]" type="1" />
          </section>
        @endforeach
      </aside>
    </div>
  </main>
@endsection


@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.public_key')}}"></script>
@endsection
