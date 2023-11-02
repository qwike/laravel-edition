@extends('layout.app')

@section('title', 'Экскурсии')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">Экскурсии</div>
        <div class="catalog">
            @if(empty($excursions))
                <div>В данный момент нет экскурсий :(</div>
            @else
                @foreach($excursions as $excursion)
                    <div class="item wow animate__animated animate__fadeInUp">
                        <div class="item_img_container">
                            <img src="{{ $excursion->getExcursionImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото домика">
                        </div>
                        <div class="item_title">{{ $excursion->name }}</div>
                        <div class="item_price_number">{{ $excursion->price }} руб.</div>
                        <div class="item_desc">
                            {{ $excursion->description }}
                        </div>
                        <div class="item_btn">Бронировать</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
        $("#tours").addClass("active_header_btn")
    </script>
    <script src="assets/js/wow.min.js"></script>
    <script>
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
