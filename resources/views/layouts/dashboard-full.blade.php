<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ config('settings.seo_meta_title') }}">
    <meta name="description" content="{{ config('settings.seo_meta_description') }}">
    <meta property="og:description" content="{{ config('settings.seo_meta_description') }}">
    <meta name="author" content="{{ config('settings.company_name') }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <link rel="icon" type="image/png" href="{{ asset('uploads/' . config('settings.site_favicon')) }}" />

    <meta name="robots" content="all,follow">

    <title>{{ config('settings.site_title') }} - @yield('title')</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @livewireStyles

    <!-- Toastr -->
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet">
    <!-- Sweet Alert 2 -->
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet">

    @stack('styles')

</head>

<body class="font-sans antialiased">
    <div x-data="mainState" :class="{ dark: isDarkMode }" @resize.window="handleWindowResize" x-cloak>
        <div class="min-h-screen text-zinc500 bg-slate-200 dark:bg-dark-bg dark:text-zinc200">
            {{-- <!-- Sidebar -->
            <x-sidebar.sidebar /> --}}
            <!-- Page Wrapper -->
            <div class="flex flex-col min-h-screen"
                style="transition-property: margin; transition-duration: 150ms;">

                <!-- Navigation Bar-->
                <x-navbar />

                <main class="pt-5 px-4 sm:px-6 flex-1">
                    @yield('content')
                </main>

                <!-- Page Footer -->
                <x-footer />
            </div>
        </div>
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <script>
        function closeAlert(event) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>

    @livewireScripts

    <script defer type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script> --}}

    <!-- Toastr -->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    <!-- Sweetalert2 -->
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

    <!-- Popper JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')

</body>

</html>
