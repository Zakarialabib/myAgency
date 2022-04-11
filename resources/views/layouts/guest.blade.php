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

    @include('partials.header')

    <main class="font-sans text-zinc900 antialiased">
        {{ $slot }}
    </main>

    <!--    announcement banner section start   -->
    <a class="announcement-banner absulute" href="{{ asset('assets/front/img/' . $setting->announcement) }}"></a>
    <!--    announcement banner section end   -->

    @include('partials.footer')

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.js" defer></script>
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

        $(window).on('load', function(event) {

            if (mainbs.is_announcement == 1) {
                // trigger announcement banner base on sessionStorage
                let announcement = sessionStorage.getItem('announcement') != null ? false : true;
                // console.log(sessionStorage.getItem('announcement'));
                if (announcement) {
                    setTimeout(function() {
                        $('.announcement-banner').trigger('click');
                    }, mainbs.announcement_delay * 1000);
                }
            }

        });

        // announcement banner magnific popup
        if (mainbs.is_announcement == 1) {
            $('.announcement-banner').magnificPopup({
                type: 'image',
                mainClass: 'mfp-fade',
                callbacks: {
                    open: function() {
                        $.magnificPopup.instance.close = function() {
                            // Do whatever else you need to do here
                            sessionStorage.setItem("announcement", "closed");
                            // console.log(sessionStorage.getItem('announcement'));

                            // Call the original close method to close the announcement
                            $.magnificPopup.proto.close.call(this);
                        };
                    }
                }
            });
        }
    </script>

    {{-- Cookie alert dialog start --}}
    {{-- @if ($setting->is_cooki_alert == 1)
		@include('cookieConsent::index')
	@endif --}}
    {{-- Cookie alert dialog end --}}

    {{-- <input type="hidden" id="main_url" value="{{ route('front.index') }}">

    @php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs = json_encode($mainbs);
    @endphp

    <script>
        var mainbs = {!! $mainbs !!};
    </script> --}}
</body>

</html>
