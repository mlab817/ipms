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
            padding: 2px;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: -1cm;
            left: 0;
            right: 0;
            height: 2cm;

            /** Extra personal styles **/
            color: black;
            text-align: left;
            line-height: 1.5cm;
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
