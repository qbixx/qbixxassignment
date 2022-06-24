<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>

    <body class="antialiased font-sans font-normal text-gray-700 leading-normal">
        @inertia
    </body>
</html>
