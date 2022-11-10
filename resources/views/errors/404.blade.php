<!doctype html>
<html dir="rtl" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'دوباره اسکن کن')
    </title>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('main/styles/font.css') }}">
    <link rel="stylesheet" href="{{ asset('main/styles/app.css') }}">
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
    <style>
        body {
            font-family: IRANSans, Serif;
        }
    </style>
</head>

<body class="h-full">
<section class="max-w-sm mx-auto mb-16 h-full">
    <div class=" flex justify-center items-center h-full">
        <div class="">
            <div class="flex flex-col py-10 opacity-30">
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                    </svg>
                </div>
                <div class="text-gray-900 text-lg">
                    لطفا مجددا اسکن کنید
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>
