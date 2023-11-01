@extends('layout.app')

@section('title', 'Гостевые домики')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">Гостевые домики</div>
        <div class="catalog">
            @if(empty($houses))
                <div>В данный момент нет домиков :(</div>
            @else
                @foreach($houses as $house)
                    <div class="item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <div class="item_img_container">
                            <img src="{{ $house->getHouseImage() }}" alt="Фото домика">
                        </div>
                        <div class="item_title">{{ $house->name }}</div>
                        <div class="item_price">{{ $house->price }}</div>
                        <div class="item_desc">{{ $house->description }}</div>
                        <div class="item_btn">Бронировать</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
        new WOW().init();
    </script>
@endsection
