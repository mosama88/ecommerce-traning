@extends('website.layouts.master')
@section('title', 'Check Code')
@section('index-active', 'active')
@section('css')
    <link rel="stylesheet" href="{{ asset('front') }}/css/reset.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/layout.css" />
    <link rel="stylesheet" href="{{ asset('front') }}/css/forgetPassword.css" />
@stop
@section('content')

    <section class="main_bg py-5">
        <div class="container">
            <div class="py-4">
                <p class="text-center main_text fw-bold">Forget Password?</p>
                <p class="text-secondary text-center mt-2">
                    Enter your email to reset your password
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <form method="POST" class="login-form">
                        <div class="d-flex flex-column gap-2">
                            <label for="email">Email</label>
                            <div class="input_container">
                                <input name="email" type="text" placeholder="example@gmail.com" />
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Send reset code
                            </button>
                        </div>
                    </form>
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
