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
            <div class="page_header_title">@lang('pages.cafe.header.title')</div>
            <div class="page_header_text">@lang('pages.cafe.header.description')</div>
            <div class="page_header_buttons">
                <a href="#events_catalog" class="page_header_button animate__animated animate__fadeIn">@lang('pages.cafe.header.button')</a>
            </div>
        </div>
    </div>
    <section id="events_catalog">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="catalog">
                @if($cafeEvents->isEmpty())
                    <div>@lang('pages.cafe.empty')</div>
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
