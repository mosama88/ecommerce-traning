@extends('website.layouts.master')
@section('title', 'About US')
@section('about-active', 'active')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/about.css" />

@stop
@section('content')

    <!-- our mission -->
    <section class="missions py-5">
        <div class="container">
            <p class="head">Our Mission</p>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission">
                        <h2>Quality Selection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.Quality SelectionLorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Mauris et ultricies est. Aliquam in
                            justo varius,
                        </p>
                        <a href="#" class="d-flex gap-2 align-items-center">
                            <p class="m-0">view More</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission">
                        <h2>Quality Selection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.Quality SelectionLorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Mauris et ultricies est. Aliquam in
                            justo varius,
                        </p>
                        <a href="#" class="d-flex gap-2 align-items-center">
                            <p class="m-0">view More</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="mission">
                        <h2>Quality Selection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.Quality SelectionLorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Mauris et ultricies est. Aliquam in
                            justo varius,
                        </p>
                        <a href="#" class="d-flex gap-2 align-items-center">
                            <p class="m-0">view More</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section  -->

    <section class="contact py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-8">
                    <div class="contact_head">
                        <h3>Have a Questions? Get in Touch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                            et ultricies est. Aliquam in justo varius, sagittis neque ut,
                            malesuada leo.
                        </p>
                        <form action="">
                            <div class="d-flex gap-4">
                                <div class="d-flex flex-column gap-2 w-50">

                                    <div class="input_container input_contact">
                                        <input type="text" placeholder="example@gmail.com" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-2 w-50 mb-4">

                                    <div class="input_container input_contact">
                                        <input type="text" placeholder="example@gmail.com" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <div class="input_container input_contact">
                                    <textarea name="" id="" placeholder="Your Message" rows="5"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3">
                            <div class="contact_icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <p class="icon-detailes">01123456789</p>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="contact_icon">
                                <i class="fa-regular fa-message"></i>
                            </div>
                            <p class="icon-detailes">Example@gmail.com</p>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="contact_icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <p class="icon-detailes">
                                adipiscing elit. Mauris et ultricies est. Aliquam in justo
                                varius,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature -->
    <section class="main_bg py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="./images/shipping.png" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>Fast & Reliable Shipping</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="./images/credit-card-buyer.png" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>Secure Payment</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="./images/restock.png" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>Easy Returns</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="feature">
                        <div class="feature_icon">
                            <img src="./images/user-headset.png" alt="" />
                        </div>
                        <div class="feature_title">
                            <h1>24/7 Customer Support</h1>
                        </div>
                        <div class="feature_description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris et ultricies est. Aliquam in justo varius, sagittis
                                neque ut, malesuada leo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

@stop
