@extends('layouts.app')

@section('content')
    <main id="main-content" class="container page-with-blocks">
        <section class="page-with-blocks-content" aria-labelledby="page-with-blocks-heading">
            <header class="section-header page-with-blocks-header">
                <h1 id="page-with-blocks-heading">{{ $page->title }}</h1>
            </header>

            <x-content-blocks :blocks="$blocks" type="1" />
        </section>
    </main>
@endsection
