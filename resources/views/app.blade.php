<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title>Qbixx test</title>
  <link rel="icon" href="{{ asset('images/qbixx.png') }}">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  @routes
  <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body class="antialiased font-sans font-normal bg-gray-500 text-gray-800 leading-normal">
@inertia
</body>
</html>
