@extends('website.layouts.master')
@section('books-active', 'active')
@section('title', 'Home')
@section('css')
    <style>
        .main_btn_added {
            background-color: white;
            /* Set background to white */
            border: 1px solid #ccc;
            /* Optional: Add a border if needed */
            color: #333;
            /* Set text color */
            cursor: default;
            /* Optional: Change cursor to pointer on hover */
        }

        .main_btn_added:hover {
            background-color: white !important;
            /* Ensure no hover effect */
            color: #333;
            /* Keep text color same during hover */
            border: 1px solid #ccc;
            /* Ensure border stays the same on hover */
        }
    </style>
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
