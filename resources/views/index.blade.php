@extends('layout.app')

@section('title', 'Деревня Мувыр')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endsection

@section('content')
    @include('partials.mainWelcome')
    @include('partials.mainExcursions')
    @include('partials.mainEntertainments')
    @include('partials.mainEvents')
    @include('partials.mainCafeEvents')
    @include('partials.mainHouses')
    <section>
        @include('partials.mainProducts')
        @include('partials.mainHistory')
    </section>
    @include('partials.formModalContainer')
    <script>
        $(document).ready(() => {
            $('.home_button').addClass('active_header_button');
            new WOW().init();
        });
    </script>
@endsection
