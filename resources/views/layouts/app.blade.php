<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name') }}</title>

    <link rel="stylesheet" type="text/css" href="/js/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    @yield('header')

</head>

<body>

    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')

    <script src="/js/jquery.min.js"></script>
    <script src="/js/semantic/semantic.min.js"></script>
    <script src="/js/custom.js"></script>

    @yield('footer')
</body>
</html>
