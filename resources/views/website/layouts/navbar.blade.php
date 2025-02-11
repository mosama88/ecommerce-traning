<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('front.index') }}">
            <img src="{{ asset('front') }}/images/logo.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars text-light"></i>
            <!-- <span class="navbar-toggler-icon "></span> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('index-active')" aria-current="page" href="{{ route('front.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('books-active')" href="{{ route('front.books') }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('about-active')" href="{{ route('front.about') }}">About us</a>
                </li>
            </ul>

            <div class="profile d-flex gap-4 align-items-center">
                <a href="{{ route('front.wishList.index') }}" class="wishlist-link">
                    <span>1</span>
                    <i class="fa-regular fa-heart fs-3"></i></a>

                <x-count-cart />

                @guest
                    <div class="d-flex gap-3">
                        <a class="main_btn login_btn" href="{{ route('login') }}" type="button">Log in</a>
                        <a class="primary_btn" href="{{ route('register') }}" type="button">Sign Up
                        </a>
                    </div>
                @endguest
                @auth
                    <div class="dropdown">
                        <button class="dropdown-toggle d-flex align-items-center border-0 profile_dropdown gap-2"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile_image">
                                <img src="{{ asset('front') }}/images/commentimage.jpeg" alt=""
                                    class="w-100 h-100" />
                            </div>
                            <div class="flex-column align-items-start">
                                <p class="fs-6 fw-bold text-light text-start">
                                    {{ auth()->user()->fullName() }}
                                </p>
                                <p class="text-secondary"> {{ auth()->user()->email }}</p>
                            </div>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item" href="{{ route('front.profile') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="orders.html">Order History</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" href="#">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
