@extends('layout.app')

@section('title', 'Гостевые домики')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">Гостевые домики</div>
        <div class="catalog">
            @if($houses->isEmpty())
                <div>В данный момент нет домиков :(</div>
            @else
                @foreach($houses as $house)
                    <div class="item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <a href="{{ route('house', ['id' => $house->id]) }}">
                            <div class="item_img_container">
                                <img src="{{ $house->getHouseImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото домика">
                            </div>
                        </a>
                        <div class="item_title">{{ $house->name }}</div>
                        <div class="item_price">{{ $house->price }}</div>
                        <div class="item_desc">{{ $house->description }}</div>
                        <a href="{{ route('house', ['id' => $house->id]) }}" class="item_btn">Бронировать</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
        new WOW().init();
    </script>
@endsection
