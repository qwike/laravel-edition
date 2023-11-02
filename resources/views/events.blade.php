@extends('layout.app')

@section('title', 'Мероприятия')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">Мероприятия</div>
        <div class="catalog">
            @if(empty($events))
                <div>В данный момент нет домиков :(</div>
            @else
                @foreach($events as $event)
                                <div class="item wow animate__animated animate__fadeInUp">
                                    <div class="item_img_container">
                                        <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото домика" second_image="assets/images/event2.jpg">
                                    </div>
                                    <div class="item_title">{{ $event->name }}</div>
                                    <div class="item_price_number">{{ $event->date }}</div>
                                    <div class="item_desc">
                                        {{ $event->description }}
                                    </div>
                                </div>
                @endforeach
            @endif
        </div>
    </div>

    <script src="assets/js/wow.min.js"></script>
    <script>
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
