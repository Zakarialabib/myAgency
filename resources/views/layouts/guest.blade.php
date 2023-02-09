<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php($website_title = \App\Models\Setting::where(['key' => 'website_title'])->first()->value ?? '')
    @php($fav_icon = \App\Models\Setting::where(['key' => 'fav_icon'])->first()->value ?? '')
    @php($announcement = \App\Models\Setting::where(['key' => 'announcement'])->first()->value ?? '')
    @php($email = \App\Models\Setting::where(['key' => 'email'])->first()->value ?? '')
    @php($phone_number = \App\Models\Setting::where(['key' => 'phone_number'])->first()->value ?? '')
    @php($footer_text = \App\Models\Setting::where(['key' => 'footer_text'])->first()->value ?? '')
    @php($is_announcement = \App\Models\Setting::where(['key' => 'is_announcement'])->first()->value ?? '')
    @php($announcement_delay = \App\Models\Setting::where(['key' => 'announcement_delay'])->first()->value ?? '')
    @php($meta_keywords = \App\Models\Setting::where(['key' => 'meta_keywords'])->first()->value ?? '')
    @php($meta_description = \App\Models\Setting::where(['key' => 'meta_description'])->first()->value ?? '')


    <!--====== Title ======-->
    <title>{{ $website_title }}</title>

    <!--====== Meta ======-->
    <meta name="title" content="{{ $meta_keywords }}">
    <meta name="description" content="@yield('meta-description')">
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('front.home') }}" />
    <meta property="og:site_name" content="{{ $website_title }}" />
    <meta name="author" content="{{ $website_title }}">
    <meta name="robots" content="all,follow">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/front/img/' . $fav_icon) }}" type="image/png">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/vendors.css') }}" media="all">

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
