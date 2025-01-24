<footer>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-4 flex-wrap gap-4">
            <div class="d-flex gap-4 align-items-center">
                <div class="logo_image">
                    <img src="{{ asset('front') }}/images/logo.png" alt="logo" />
                </div>
                <div class="links_footer">
                    <ul class="d-flex gap-3 align-items-center p-0 m-0">
                        <li>
                            <a class="nav-link.active" href="{{ route('front.index') }}">Home</a>

                        </li>
                        <li>
                            <a class="nav-link.active" href="{{ route('front.books') }}">Books</a>
                        </li>
                        <li>
                            <a class="nav-link.active" href="{{ route('front.about') }}">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="social-icons d-flex gap-3">
                <img src="images/face.png" alt="" />
                <img src="images/insta.png" alt="" />
                <img src="images/youtube.png" alt="" />
                <img src="images/x.png" alt="" />
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 pt-4">
            <div>
                <p class="text-light">
                    &lt; Developed By &gt; EraaSoft &lt; All Copy Rights Reserved @
                    2024
                </p>
            </div>
            <div class="lang d-flex gap-3">
                <img src="{{ asset('front') }}/images/lang.png" alt="" class="image_lang" />
                <select name="lang" id="lang">
                    <option value="english" class="d-flex align-items-center">
                        English
                    </option>
                    <option value="arabic">عربي</option>
                </select>
            </div>
        </div>
    </div>
</footer>
