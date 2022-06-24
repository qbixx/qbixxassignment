<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Qbixx test</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="antialiased font-sans font-normal text-gray-700 leading-normal">
        <div class="w-full">
            @yield('content')
        </div>
    </body>
</html>
