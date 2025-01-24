<section class="hero-section">
    <header>
        @include('website.layouts.navbar')
        <div class="overlay"></div>
    </header>
    @if (Route::is('front.index'))
        <div class="search">
            <form action="POST">
                <div class="search_input">
                    <input type="text" placeholder="Search" />
                    <button class="search_btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    @endif

    @if (Route::is('front.about'))
        <div class="search">
            <div>
                <div class="about">
                    <h1 class="about_title">About Bookshop</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et
                        ultricies est. Aliquam in justo varius, sagittis neque ut,
                        malesuada leo.
                    </p>
                </div>
            </div>
        </div>
    @endif
</section>
