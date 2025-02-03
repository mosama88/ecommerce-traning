@extends('website.layouts.master')
@section('title', 'Cart')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/cart.css" />
@stop
@section('content')
    <main>
        <section class="my-5">
            <div class="container">
                <div class="row py-4 table_head">
                    <div class="col-5">
                        <p>Item</p>
                    </div>
                    <div class="col-2">
                        <p>Quantity</p>
                    </div>
                    <div class="col-2">
                        <p>Price</p>
                    </div>
                    <div class="col-3">
                        <p>Total Price</p>
                    </div>
                </div>
                @forelse ($books as $book)
                    <div class="col-12">
                        <div class="item-cart row">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="item-image">
                                    @if ($book->getFirstMediaUrl('image', 'preview'))
                                        <img src="{{ $book->getFirstMediaUrl('image', 'preview') }}" alt=""
                                            class="w-100 h-100" />
                                    @else
                                        <img src="{{ asset('dashboard') }}/default_book.png" alt="Thumbnail"
                                            class="w-100 h-100">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="item-description d-flex flex-column gap-2">
                                    <p class="fw-bold">{{ $book->name }}</p>
                                    <p class="description">
                                        Author:
                                        <span class="fw-bold text-dark">{{ $book->author->name }}</span>
                                    </p>
                                    <p class="description book-description">
                                        {{ Str::limit($book->description, 60) }}
                                    </p>
                                    <div class="dlivery d-flex gap-3">
                                        <img src="{{ asset('front') }}/images/shipping.png" alt="" width="20"
                                            height="20" />
                                        <p class="description">Free Shipping Today</p>
                                    </div>
                                    <p class="description">
                                        <span class="sell-code description fw-bold fs-5">ASIN :</span>B09TWSRMCB
                                    </p>
                                </div>
                            </div>
                            @php
                                $qty = session()->get('cart')[$book->id];
                            @endphp
                            <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <div class="d-flex gap-3 align-items-center mt-3">
                                    <div class="books_count d-flex gap-3 align-items-center">
                                        <span>-</span>
                                        <p>{{ $qty }}</p>
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <p class="fw-bold fs-5 mt-3">${{ $book->price }}</p>
                            </div>

                            <div class="sell-price col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <p class="fw-bold fs-5 mt-3">${{ $book->price * $qty }}</p>
                            </div>
                            <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">
                                <form action="{{ route('front.cart.removeItem', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="fs-5 mt-3 del-item">
                                        <button class="border-0">
                                            <i class="fa-solid fa-trash-can main_text"></i>
                                            <p class="remove">Remove</p>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>Your Cart Is Empty</h4>
                @endforelse

            </div>
        </section>
        <!-- payment -->
        <section class="my-5 py-5 payment-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="payment">
                            <p class="payment_title">Payment Summary</p>
                            <p class="payment_description description fs-6 mt-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                            <div class=" py-5">
                                <p class="fs-4 description mt-3">Have a discount code?</p>
                                <div class="d-flex gap-3 mt-3">
                                    <form class="input_container w-50">
                                        <img src="{{ asset('front') }}/images/ticket.png" alt="" />
                                        <input type="text" placeholder="Enter Promo Code" />
                                    </form>
                                    <button class="cart_btn main_btn">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="total p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-secondary fs-5">Subtotal</p>
                                <p class="fs-4 fw-bold">${{ $books_sum }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="text-secondary fs-5">Shipping</p>
                                <p class="fs-4 fw-bold">Free Delivery</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center py-3">
                                <p class="text-secondary fs-5">Tax</p>
                                <p class="fs-4 fw-bold">$4</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-top py-3">
                                <p class="text-secondary fs-5">Total</p>
                                <p class="fs-3 fw-bold main_text">$124</p>
                            </div>
                        </div>
                        <button class="main_btn w-100">Check out</button>
                        <button class="primary_btn w-100 mt-3">Keep Shopping</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')

@stop
