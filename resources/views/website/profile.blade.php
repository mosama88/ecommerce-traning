@extends('website.layouts.master')
@section('title', 'Profile')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/profile.css" />

@stop
@section('content')


    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="profile d-flex justify-content-center">
                    <div class="profile_image">
                        <img src="{{ asset('front') }}/images/commentimage.jpeg" alt="profile image" />
                    </div>
                </div>

                <div class="col-12 col-lg-7">
                    <form class="profile_form">
                        <h3 class="text-center my-3">General information</h3>
                        <div class="row g-4">
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column gap-2">
                                    <label for="firstname">First Name</label>
                                    <div class="input_container">
                                        <input type="text" placeholder="John" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column gap-2">
                                    <label for="lastname">Last Name</label>
                                    <div class="input_container">
                                        <input type="text" placeholder="example@gmail.com" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    <label for="email">Email</label>
                                    <div class="input_container">
                                        <input type="email" placeholder="example@gmail.com" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    <label for="phonenumber">Phone number</label>
                                    <div class="input_container">
                                        <input type="email" placeholder="123456789" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column gap-2">
                                    <label for="address">Address</label>
                                    <div class="input_container">
                                        <input type="text" placeholder="Maadi, Cairo, Egypt." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center">
                        <button class="main_btn mt-3">Update information</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

@stop
