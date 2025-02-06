@extends('website.layouts.master')
@section('title', 'Forget Password')
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
                <p class="text-center main_text fw-bold">Reset your password!</p>
                <p class="text-secondary text-center mt-2">
                    Enter New Password and Confirm
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('forgetPassword.resetPassword') }}" method="POST">
                        @csrf
                        <input hidden type="email" name="email" value="{{ $email }}" required />
                        <input hidden type="text" name="code" value="{{ $code }}" required />
                        <div class="d-flex flex-column gap-2 mb-3">
                            <label for="password">New Password</label>
                            <div class="input_container">
                                <input name="password" type="password" placeholder="********" />
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input_container">
                                <input name="password_confirmation" type="password" placeholder="********" />
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Reset Password
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let inputs = document.querySelectorAll(".input_container input");

            inputs.forEach((input, index) => {
                input.addEventListener("input", function() {
                    if (this.value.length === this.maxLength) {
                        let nextInput = inputs[index + 1];
                        if (nextInput) {
                            nextInput.focus();
                        }
                    }
                });

                input.addEventListener("keydown", function(event) {
                    if (event.key === "Backspace" && this.value.length === 0) {
                        let prevInput = inputs[index - 1];
                        if (prevInput) {
                            prevInput.focus();
                        }
                    }
                });
            });
        });
    </script>

@stop
