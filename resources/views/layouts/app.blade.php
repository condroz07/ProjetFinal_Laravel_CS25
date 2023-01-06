{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')

    <!-- jquery plugins here-->
    <script src="{{ asset("js/jquery-1.12.1.min.js") }}"></script>
    <!-- popper js -->
    <script src="{{ asset("js/popper.min.js") }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <!-- easing js -->
    <script src="{{ asset("js/jquery.magnific-popup.js") }}"></script>
    <!-- swiper js -->
    <script src="{{ asset("js/swiper.min.js") }}"></script>
    <!-- swiper js -->
    <script src="{{ asset("js/masonry.pkgd.js") }}"></script>
    <!-- particles js -->
    <script src="{{ asset("js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("js/jquery.nice-select.min.js") }}"></script>
    <!-- slick js -->
    <script src="{{ asset("js/slick.min.js") }}"></script>
    <script src="{{ asset("js/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("js/waypoints.min.js") }}"></script>
    <script src="{{ asset("js/contact.js") }}"></script>
    <script src="{{ asset("js/jquery.ajaxchimp.min.js") }}"></script>
    <script src="{{ asset("js/jquery.form.js") }}"></script>
    <script src="{{ asset("js/jquery.validate.min.js") }}"></script>
    <script src="{{ asset("js/mail-script.js") }}"></script>
    <!-- custom js -->
    <script src="{{ asset("js/custom.js") }}"></script>
</body>

</html>