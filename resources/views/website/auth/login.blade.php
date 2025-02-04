@extends('website.layouts.master')
@section('title', 'Login')
@section('index-active', 'active')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/login.css" />
@stop
@section('content')

    <section class="main_bg py-5">
        <div class="container">
            <p class="text-center main_text fw-bold py-4">Welcome Back!</p>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">

                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                        <div class="d-flex flex-column gap-2">
                            <label for="email">Email</label>
                            <div name="email" class="input_container">
                                <input type="text" name="email" placeholder="example@gmail.com" />
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2 my-3">
                            <label for="email">Password</label>
                            <div class="d-flex align-items-center input_container">
                                <input name="password" type="password" placeholder="Enter password" />
                                <i class="fa-regular fa-eye"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items center mt-3">
                            <div>
                                <label for="rememberMe">Remember me</label>
                                <input type="checkbox" name="eememberme" id="rememberMe" />
                            </div>
                            <a href="{{ route('password.request') }}" class="main_text">Forget password?</a>
                        </div>
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Log in
                            </button>
                        </div>
                    </form>
                    <p class="mt-4 text-center">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="main_text">Signup</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script src="path-to-the-script/splide-extension-auto-scroll.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="{{ asset('front') }}/js/home.js"></script>
@stop
