@extends('website.layouts.master')
@section('title', 'Wish List')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/wishlist.css" />
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

                <div class="row">
                    <div class="col-12">
                        <div class="item-cart row">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="item-image">
                                    <img src="{{ asset('front') }}/images/book-1.jpg" alt="" class="w-100 h-100" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="item-description d-flex flex-column gap-2">
                                    <p class="fw-bold">Rich Dad And Poor Dad</p>
                                    <p class="description">
                                        Author:
                                        <span class="fw-bold text-dark">Robert T. Kiyosanki</span>
                                    </p>
                                    <p class="description book-description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Mauris et ultricies est. Aliquam in justo varius, sagittis
                                        neque ut,
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
                            <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <div class="d-flex gap-3 align-items-center mt-3">
                                    <div class="books_count d-flex gap-3 align-items-center">
                                        <span>-</span>
                                        <p>1</p>
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <p class="fw-bold fs-5 mt-3">$40</p>
                            </div>
                            <div class="sell-price col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <p class="fw-bold fs-5 mt-3">$40</p>
                            </div>
                            <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">
                                <div class="fs-5 mt-3 del-item">
                                    <i class="fa-solid fa-trash-can main_text"></i>
                                    <p class="remove">Remove</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="item-cart row">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="item-image">
                                    <img src="{{ asset('front') }}/images/book-1.jpg" alt="" class="w-100 h-100" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="item-description d-flex flex-column gap-2">
                                    <p class="fw-bold">Rich Dad And Poor Dad</p>
                                    <p class="description">
                                        Author:
                                        <span class="fw-bold text-dark">Robert T. Kiyosanki</span>
                                    </p>
                                    <p class="description book-description">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Mauris et ultricies est. Aliquam in justo varius, sagittis
                                        neque ut,
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
                            <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <div class="d-flex gap-3 align-items-center mt-3">
                                    <div class="books_count d-flex gap-3 align-items-center">
                                        <span>-</span>
                                        <p>1</p>
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <p class="fw-bold fs-5 mt-3">$40</p>
                            </div>
                            <div class="sell-price col-lg-2 col-md-4 col-sm-4 d-flex align-items-center">
                                <p class="fw-bold fs-5 mt-3">$40</p>
                            </div>
                            <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">
                                <div class="fs-5 mt-3 del-item">
                                    <i class="fa-solid fa-trash-can main_text"></i>
                                    <p class="remove">Remove</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 justify-content-center mt-4 flex-wrap">
                        <button class="main_btn move-cart-btn col-12 col-md-5 col-lg-2">
                            Move to cart
                        </button>

                        <button class="main_btn d-flex justify-content-between align-items-center col-12 col-md-5 col-lg-4">
                            <div>
                                <div class="checkout-btn">
                                    <p>2 Item</p>
                                    <p>$80</p>
                                </div>
                            </div>
                            <div>
                                <p class="fs-6 fw-bold">Check out</p>
                            </div>
                            <div class="arrow-icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')

@stop
