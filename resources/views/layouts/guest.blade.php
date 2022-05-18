<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <meta name="title" content="{{ config('settings.seo_meta_title') }}">
    <meta name="description" content="{{ config('settings.seo_meta_description') }}">
    <meta property="og:description" content="{{ config('settings.seo_meta_description') }}"> --}}
    @php($website_title = \App\Models\Setting::where(['key' => 'website_title'])->first()->value ?? '')
    @php($fav_icon = \App\Models\Setting::where(['key' => 'fav_icon'])->first()->value ?? '')
    @php($announcement = \App\Models\Setting::where(['key' => 'announcement'])->first()->value ?? '')
    @php($email = \App\Models\Setting::where(['key' => 'email'])->first()->value ?? '')
    @php($phone_number = \App\Models\Setting::where(['key' => 'phone_number'])->first()->value ?? '')
    @php($footer_text = \App\Models\Setting::where(['key' => 'footer_text'])->first()->value ?? '')
    @php($is_announcement = \App\Models\Setting::where(['key' => 'is_announcement'])->first()->value ?? '')
    @php($announcement_delay = \App\Models\Setting::where(['key' => 'announcement_delay'])->first()->value ?? '')


    <!--====== Title ======-->
    <title>{{ $website_title }}</title>

    <!--====== Meta ======-->
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('front.home') }}" />
    <meta property="og:site_name" content="{{ $website_title }}" />
    <meta name="author" content="{{ $website_title }}">
    <meta name="robots" content="all,follow">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/front/img/' . $fav_icon) }}" type="image/png">

    <!-- Fonts -->

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/app.css') }}" media="all">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vendors.css') }}" media="all">
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('/css/animate.min.css') }}" media="all"> --}}

    <!-- Toastr -->
    {{-- <link type="text/css" href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" media="all"> --}}

    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>

</head>

<body class="font-sans antialiased">

    @include('partials.front.header')

    <main class="font-sans text-zinc-900 antialiased">
        {{ $slot }}
    </main>

    <!--    announcement banner section start   -->
    <a class="announcement-banner absulute" href="{{ asset('assets/front/img/' . $announcement) }}"></a>
    <!--    announcement banner section end   -->

    @include('partials.front.footer')

</body>

</html>
