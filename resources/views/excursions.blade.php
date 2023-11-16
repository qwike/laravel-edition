@extends('layout.app')

@section('title', 'Экскурсии')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">--}}
@endsection

@section('content')
        <div class="welcome_catalog" id="welcome_excursions">
            <div class="container">
                <div class="welcome_title">@lang('pages.excursions.title')</div>
                <div class="welcome_text">В нашей деревне есть всё: от спокойного плавания на лодках до экстремальных прогулок по лесу</div>
                <div class="welcome_buttons">
                    <a href="#excursions_catalog" class="welcome_excursions_button">Выбрать экскурсию</a>
                </div>
            </div>
        </div>
        <section id="excursions_catalog">
            <div class="container mt">
                <div class="catalog">
                    @if($excursions->isEmpty())
                        <div>@lang('pages.main.excursions.empty')</div>
                    @else
                        @foreach($excursions as $excursion)
                            <div class="card">
                                <div class="card_img_box">
                                    <img src="{{ $excursion->getExcursionImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $excursion->name }}">
                                </div>
                                <div class="card_info">
                                    <div class="card_title">{{ $excursion->name }}</div>
                                    <div class="card_description">{{ $excursion->description }}</div>
                                    <div class="card_line">
                                        <div class="card_price">{{ $excursion->price > 0? $excursion->price . '₽ ' : 'БЕСПЛАТНО' }}</div>
                                        <button class="card_button">
                                            Оставить заявку
                                            <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @include('partials.formModal')
    <script>
        $(".b_excursions").addClass("active_btn")
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
