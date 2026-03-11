@extends('layouts.app')

@section('content')
  <main id="main-content" class="container contact-page">
    <section class="content-block" aria-labelledby="contact-page-heading">
      <h1 id="contact-page-heading" class="subheading">Contact Us</h1>
      <p>Questions, corrections, sponsorship requests, or tips? Send us a message and our editorial team will respond.</p>

      <form class="contact-form" action="#" method="post">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" autocomplete="name" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" autocomplete="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
      </form>
    </section>
  </main>
@endsection


@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.public_key')}}"></script>
@endsection
