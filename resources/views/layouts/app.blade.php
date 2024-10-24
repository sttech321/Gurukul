<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    @vite(['resources/css/app.css', 'resources/css/bootstrap.min.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-900">
        <main class="page-wrapper chiller-theme toggled">
            <div class="page-content">
            @include('layouts.navigation')
                <div class="sidebarRightContentWrap">
                    <div class="flex-grow">
                        <!-- Page Heading -->
                        @isset($header)
                        <header class="bg-white dark:bg-gray-800 shadow">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                        @endisset
                        <!-- Page Content -->
                        {{ $slot }}
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
    </div>

    @vite(['resources/js/bootstrap.bundle.min.js', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if ($(this).parent().hasClass("active")) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this).parent().removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this).next(".sidebar-submenu").slideDown(200);
                    $(this).parent().addClass("active");
                }
            });

            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });

            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });
        });
    </script>
</body>

</html>