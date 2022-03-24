<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('settings.site_title') }} - @yield('title')</title>
    
    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    @include('partials.styles')

    @include('partials.scripts')

</head>

<body class="font-sans antialiased">
    <div x-data="mainState" :class="{ dark: isDarkMode }" @resize.window="handleWindowResize" x-cloak>
        <div class="min-h-screen text-zinc500 bg-slate-200 dark:bg-dark-bg dark:text-zinc200">
            <!-- Sidebar -->
            <x-sidebar.sidebar />
            <!-- Page Wrapper -->
            <div class="flex flex-col min-h-screen"
                :class="{ 
                    'lg:ml-64': isSidebarOpen,
                    // 'md:ml-16': !isSidebarOpen,
                }"
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
</body>

</html>
