<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'داشبورد مدیریت')</title>
    <link href="{{ asset('dashboard/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/fonts.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/select2.min.css') }}" rel="stylesheet" /> @livewireStyles
</head>

<body>
    @include('sweetalert::alert')
    <x-dashboard.nav/>
    <div class="container-fluid">
        <div class="row">
            <x-dashboard.sidenav/>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @include('common.errors') @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('dashboard/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/select2.min.js') }}"></script>
    @yield('scripts') @livewireScripts
</body>

</html>