<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="https://unpkg.com/@github/details-dialog-element/dist/index.css" rel="stylesheet" />

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
@include('partials.header')

<x-flash-message></x-flash-message>

@yield('page-header')

<div class="Layout Layout--gutter-none">
    <div class="Layout-main">
        <div class="container-lg py-6">
            @yield('content')
        </div>
{{--        <div class="container py-3 pr-3">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
    </div>
</div>

@stack('scripts')
<script type="text/javascript">
    function confirmLogout() {
        let confirmLogout = confirm('Are you sure you want to logout?')

        if (confirmLogout) {
            let logoutForm = document.getElementById('logout')
            logoutForm.submit()
        }
    }
</script>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
