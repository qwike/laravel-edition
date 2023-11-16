<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    @yield('css')
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/wow.min.js') }}"></script>
</head>
<body class="antialiased">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</body>
</html>
