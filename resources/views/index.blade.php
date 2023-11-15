@extends('layout.app')

@section('title', 'Деревня Мувыр')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
@endsection

@section('content')
    @include('partials.mainWelcome')
    @include('partials.mainExcursions')
    @include('partials.mainEntertainments')
    @include('partials.mainEvents')
    @include('partials.mainHouses')
    <section>
        @include('partials.mainProducts')
        @include('partials.mainHistory')
    </section>
    @include('partials.mainContacts')
    <script>
        new WOW().init();
    </script>
@endsection
