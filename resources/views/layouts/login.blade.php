<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/util.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/flat-ui.css') }}" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
<div style="background-color: #1abc9c;">
    @yield('content')
</div>
</body>
</html>
