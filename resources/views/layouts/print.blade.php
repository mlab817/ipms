<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">--}}
    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
</head>
<body onload="window.print()">

    <div class="d-print-none d-flex flex-justify-center m-3">
        <button type="button" class="btn d-print-none mb-5" onclick="window.open('', '_self', ''); window.close();">Close this window</button>
    </div>

    <div class="container-lg mx-auto">
        @yield('content')
    </div>

</body>
</html>
