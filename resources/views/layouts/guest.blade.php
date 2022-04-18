<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <meta name="title" content="{{ config('settings.seo_meta_title') }}">
    <meta name="description" content="{{ config('settings.seo_meta_description') }}">
    <meta property="og:description" content="{{ config('settings.seo_meta_description') }}"> --}}

    <!--====== Title ======-->
    <title>{{ $setting->website_title }}</title>

    <!--====== Meta ======-->
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('front.home') }}" />
    <meta property="og:site_name" content="{{ $setting->website_title }}" />
    <meta name="author" content="{{ $setting->website_title }}">
    <meta name="robots" content="all,follow">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/front/img/' . $setting->fav_icon) }}" type="image/png">

    <!-- Fonts -->

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/app.css') }}" media="all">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css') }}" media="all">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/animate.min.css') }}" media="all">
    <!-- Toastr -->
    <link type="text/css" href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" media="all">

    @livewireStyles
    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('/js/app.js') }}" async></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</head>

<body class="font-sans antialiased">

    <div class="social-media" style="transition-delay: 0.5s;">
        <div class="layer" style="transition-delay: 0.3s;"> </div>
        <!-- end layer -->
        <div class="inner" style="transition-delay: 0s;">
            <h5>Social Share </h5>
            <ul>
                <li><a href="#">Facebook</i></a></li>
                <li><a href="#">Twitter</i></a></li>
                <li><a href="#">Linkedin</i></a></li>
                <li><a href="#">Dribble</i></a></li>
                <li><a href="#">Youtube</i></a></li>
            </ul>
        </div>
    </div>

    @include('partials.front.header')

    <main class="font-sans text-zinc-900 antialiased">
        {{ $slot }}
    </main>

    <!--    announcement banner section start   -->
    <a class="announcement-banner absulute" href="{{ asset('assets/front/img/' . $setting->announcement) }}"></a>
    <!--    announcement banner section end   -->

    @include('partials.front.footer')
    
</body>

</html>
