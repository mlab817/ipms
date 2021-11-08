<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">--}}
    <title>{{ config('app.name') }}</title>

    <style>
        table, tr, th, td {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        p {
            text-align: justify;
        }

        th, td {
            margin: 0;
            padding: 0;
        }

        @page {
            margin: 60px 60px 60px 60px !important;
            padding: 0 !important;
        }

    </style>
</head>
<body>

@yield('content')

</body>
</html>
