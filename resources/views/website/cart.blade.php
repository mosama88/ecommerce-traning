@extends('website.layouts.master')
@section('title', 'Cart')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/cart.css" />
@stop
@section('content')


    @livewire('website.cart.cart-page-component', ['books' => $books, 'cart' => $cart, 'books_sum' => $books_sum])


@endsection
@section('js')

@stop
