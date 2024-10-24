<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    @vite(['resources/css/app.css', 'resources/css/bootstrap.min.css', 'resources/css/pages.css', 'resources/css/sidebar.css', 'resources/css/font-awesome.min.css', 'resources/css/common.css'])
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

    <!-- lang js code  -->

    <script>
        document.querySelector('.dropdown-toggle').addEventListener('click', function() {
            const menu = document.querySelector('.dropdown-menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        });
        window.addEventListener('click', function(event) {
            const menu = document.querySelector('.dropdown-menu');
            if (!event.target.matches('.dropdown-toggle') && menu.style.display === 'block') {
                menu.style.display = 'none';
            }
        });
    </script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('profilePage');
        });
    </script> -->
    <script>
        function updatePadding() {
            const mediaQuery = window.matchMedia('(max-width: 1460px)');
            const pageContent = document.querySelector('.page-wrapper.toggled .page-content');

            if (pageContent) {
                if (mediaQuery.matches) {

                    pageContent.style.paddingLeft = '0';
                } else {

                    pageContent.style.paddingLeft = '';
                }
            }

        }


        updatePadding();
        window.addEventListener('resize', updatePadding);
    </script>
    <script>
        function updateStyles() {
            const mediaQuery = window.matchMedia('(max-width: 1024px)');
            const pageContent = document.querySelector('.page-wrapper.toggled .page-content');
            const pageWrapper = document.querySelector('.page-wrapper');

            if (pageContent && pageWrapper) {
                if (mediaQuery.matches) {
                    // If viewport width is below 1460px, remove 'toggled' class and set padding-left to 0
                    pageContent.style.paddingLeft = '0';
                    pageWrapper.classList.remove('toggled');
                } else {
                    // If viewport width is 1460px or above, reset padding-left and ensure 'toggled' class is present
                    pageContent.style.paddingLeft = '';
                    pageWrapper.classList.add('toggled');
                }
            }
        }

        // Initial check on page load
        window.addEventListener('load', updateStyles);

        // Add event listener to handle changes in viewport width
        window.addEventListener('resize', updateStyles);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.querySelector('.dropdown-toggle');

            if (dropdownToggle) { // Check if the element exists
                dropdownToggle.addEventListener('click', function() {
                    this.parentElement.classList.toggle('show');
                });
            }

            window.addEventListener('click', function(event) {
                if (!event.target.matches('.dropdown-toggle')) {
                    var dropdowns = document.getElementsByClassName("dropdown");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>