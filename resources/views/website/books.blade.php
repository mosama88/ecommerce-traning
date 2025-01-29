@extends('website.layouts.master')
@section('books-active', 'active')
@section('title', 'Home')
@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/books.css" />
@stop
@section('content')
    <section class="library my-5">
        <div class="container">


            @livewire('website.book-filter', ['categories' => $categories])

        </div>
    </section>
@stop
@section('js')
    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('front') }}/js/books.js"></script>

@endsection
