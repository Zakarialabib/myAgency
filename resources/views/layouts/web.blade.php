<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--
    <meta name="title" content="{{ config('settings.seo_meta_title') }}">
    <meta name="description" content="{{ config('settings.seo_meta_description') }}">
    <meta property="og:description" content="{{ config('settings.seo_meta_description') }}">
    --}}
    
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
    <link rel="shortcut icon" href="{{ asset('assets/front/img/'.$setting->fav_icon) }}" type="image/png">

    <!-- Fonts -->

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/app.css') }}" media="all">
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css') }}" media="all">
    <!-- Toastr -->
    <link type="text/css" href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" media="all">
    
    @livewireStyles
    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('/js/app.js') }}" defer></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

</head>

<body class="font-sans antialiased">

    @include('partials.header')
    
    <div class="font-sans text-zinc900 antialiased">
        {{ $slot }}
    </div>

    @include('partials.footer')

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.js" defer=""></script>
    <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/anime.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/scrollreveal.min.js') }}"></script>

    @livewireScripts
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>

</body>

</html>
