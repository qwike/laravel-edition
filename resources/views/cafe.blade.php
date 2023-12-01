@extends('layout.app')

@section('title', 'Кафе')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cafe.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_cafe">
        <div class="container">
            <div class="page_header_title">Кафе</div>
            <div class="page_header_text">В нашем уютном кафе вы можете провести любой праздник. Наша команда профессионалов позаботиться об организации и устроит все так, что у вас не будет времени заскучать</div>
            <div class="page_header_buttons">
                <a href="#events_catalog" class="page_header_button">Посмотреть все</a>
            </div>
        </div>
    </div>
    <section id="events_catalog">
        <div class="container">
            <div class="catalog">
                @if($cafeEvents->isEmpty())
                    <div>В данный момент мероприятий в кафе не проводится</div>
                @else
                    @foreach($cafeEvents as $cafeEvent)
                        <div class="card">
                            <div class="card_img_box">
                                <img src="{{ $cafeEvent->getCafeEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $cafeEvent->name }}">
                            </div>
                            <div class="card_info">
                                <div class="card_title">{{ $cafeEvent->name }}</div>
                                <div class="card_description">{{ $cafeEvent->description }}</div>
                                <div class="card_line">
                                    <button class="card_button orderable"
                                            data-position-name="{{ $cafeEvent->name }}"
                                            data-position-price="Договорная"
                                            data-orderable-type="{{ \App\Enums\OrderTypeEnum::from(\App\Models\CafeEvent::class)->name }}"
                                            data-orderable-id="{{ $cafeEvent->id }}">
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
    @include('partials.formModalContainer')
    <script>
        $(document).ready(() => {
            $('.cafe_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
