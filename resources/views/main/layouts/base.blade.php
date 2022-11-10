<!doctype html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'صفحه اصلی')
    </title>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('main/styles/font.css') }}">
    <link rel="stylesheet" href="{{ asset('main/styles/app.css?12') }}">
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
    <style>
        body {
            font-family: IRANSans, Serif;
        }
    </style>
    <script src="{{ asset('main/javascripts/jquery-1.9.1.min.js') }}"></script>
    <script>
        $(window).load(function() {
            $('#overlay').fadeOut();
        });
    </script>
</head>

<body>
    <section class="max-w-sm mx-auto mb-16">
        @include('sweetalert::alert') @include('components.client.preloader') @yield('content')
    </section>
    @yield('scripts') @livewireScripts
</body>

</html>
