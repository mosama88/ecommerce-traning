<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.layouts.head')
</head>

<body>
    @include('website.layouts.hero-section')
    @yield('content')
    @include('website.layouts.footer')
    @include('website.layouts.scripts')
</body>

</html>
