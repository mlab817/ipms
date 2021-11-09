<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">--}}
    <title>{{ config('app.name') }}</title>

    <style>
        @font-face {
            font-family: Cambria;
            src: local('Cambria'), url({{ storage_path('/fonts/Cambria.ttf') }});
        }

        @font-face {
            font-family: CambriaBold;
            src: local('Cambria Bold'), url({{ storage_path('/fonts/cambriab.ttf') }});
        }

        .strong {
            font-family: 'CambriaBold', serif;
        }

        body, td {
            font-family: Cambria, serif;
            font-size: 1em;
        }

        table, tr, th, td {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        table {
            table-layout: fixed;
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
            white-space: normal;
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
            line-height: 1em;
        }

        @page {
            margin: 60px 60px 60px 60px !important;
            padding: 0 !important;
        }

        table {
            page-break-inside:auto
        }

        tr {
            page-break-inside:avoid;
            page-break-after:auto
        }

    </style>
</head>
<body>

@yield('content')

</body>
</html>
