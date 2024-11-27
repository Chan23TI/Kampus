<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Landing Page')</title>
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.ico') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist/assets/libs/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/assets/libs/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/assets/css/icons.min.css') }}">
</head>
<body>
    @include('components.navbar')
    @yield('content')
    @include('components.footer')


    <script src="{{ asset('dist/assets/libs/@frostui/tailwindcss/frostui.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/aos/aos.js') }}"></script>
    <script src="{{ asset('dist/assets/js/theme.min.js') }}"></script>
</body>
</html>
