@extends('layout.app')

@section('title', 'Деревня Мувыр')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">
@endsection

@section('content')
    <section class="welcome">
        <div class="welcome_title wow animate__animated animate__fadeInUpBig">
            <p>@lang('pages.main.title')</p>
            <p><span>@lang('pages.main.title_name')</span></p>
            <a class="learn_more" href="#learn_more">@lang('pages.main.learn_more')</a>
        </div>
    </section>
    <main>
        @include('partials.mainExcursions')
        @include('partials.mainEvents')
        @include('partials.mainEntertainments')
        @include('partials.mainHouses')
        @include('partials.mainProducts')
        @include('partials.mainProjects')
        @include('partials.mainHistory')
        @include('partials.mainContacts')
    </main>
    <script src="{{ asset('/js/slick.js') }}"></script>
    <script src="{{ asset('/js/mainSliders.js') }}"></script>
    <script>
        new WOW().init();
    </script>
@endsection
