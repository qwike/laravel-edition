@extends('layout.app')

@section('title', 'Экскурсии')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_excursions">
        <div class="container">
            <div class="page_header_title">@lang('pages.excursions.header.title')</div>
            <div class="page_header_text">@lang('pages.excursions.header.description')</div>
            <div class="page_header_buttons">
                <a href="#excursions_catalog" class="page_header_button animate__animated animate__fadeIn">@lang('pages.excursions.header.button')</a>
            </div>
        </div>
    </div>
    <section id="excursions_catalog">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="catalog">
                @if($excursions->isEmpty())
                    <div>@lang('pages.excursions.empty')</div>
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
                                    <div class="card_price">{{ $excursion->price > 0? 'От ' . $excursion->price . '₽ ' : "БЕСПЛАТНО" }}</div>
                                    <button class="card_button orderable"
                                            data-position-name="{{ $excursion->name }}"
                                            data-position-price="{{ $excursion->price > 0? 'От ' . $excursion->price . '₽ ' : 'БЕСПЛАТНО' }}"
                                            data-orderable-type="{{ \App\Enums\OrderTypeEnum::from(\App\Models\Excursion::class)->name }}"
                                            data-orderable-id="{{ $excursion->id }}">
                                        @lang('pages.excursions.button')
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
            $('.excursions_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
