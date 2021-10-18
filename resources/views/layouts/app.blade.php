<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
@include('partials.header')

<div class="Layout Layout--flowRow-until-md">
    <div class="Layout-main py-3 pr-3">
        @yield('content')
    </div>
    <div class="Layout-sidebar border" style="min-height: calc(100vh - 64px)">
        @include('partials.sidebar')
    </div>
</div>

@stack('scripts')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
