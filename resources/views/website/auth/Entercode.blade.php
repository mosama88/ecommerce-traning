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
                    Enter the 4 digits code that you received on your email
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('forgetPassword.checkOtp') }}" method="POST">
                        @csrf
                        <input hidden type="email" name="email" value="{{ $email }}" required />
                        <div class="d-flex  gap-2 ">
                            <div class="input_container w-25">
                                <input type="text" name="code1" maxlength="1" autofocus class="text-center"
                                    required />
                                @error('code1')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="input_container w-25">
                                <input type="text" name="code2" maxlength="1" class="text-center" required />
                                @error('code2')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="input_container w-25">
                                <input type="text" name="code3" maxlength="1" class="text-center" required />
                                @error('code3')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="input_container w-25">
                                <input type="text" name="code4" maxlength="1" class="text-center" required />
                                @error('code4')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="main_btn w-100 mt-3">
                                Submit
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
