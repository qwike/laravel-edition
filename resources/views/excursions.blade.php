@extends('layout.app')

@section('title', 'Экскурсии')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">@lang('pages.excursions.title')</div>
        <div class="catalog">
            @if($excursions->isEmpty())
                <div>@lang('pages.excursions.empty')</div>
            @else
                @foreach($excursions as $excursion)
                    <div class="item wow animate__animated animate__fadeInUp">
                        <div class="item_img_container">
                            <img src="{{ $excursion->getExcursionImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото домика">
                        </div>
                        <div class="item_title">{{ $excursion->name }}</div>
                        <div class="item_price">{{ $excursion->price }} руб.</div>
                        <div class="item_desc">
                            {{ $excursion->description }}
                        </div>
                        <div
                            class="item_btn"
                            data-position-name="{{ $excursion->name }}"
                            data-position-price="{{ $excursion->price }} руб.">
                                @lang('pages.excursions.button')
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @include('partials.formModal')
    <script src="{{ asset('/js/modalForm.js') }}"></script>
    <script>
        $(".b_excursions").addClass("active_btn")
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
