@extends('layout.app')

@section('title', 'Гостевые домики')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_houses">
        <div class="container">
            <div class="page_header_title">@lang('pages.houses.header.title')</div>
            <div class="page_header_text">@lang('pages.houses.header.description')</div>
            <div class="page_header_buttons">
                <a href="#houses_catalog" class="page_header_button">@lang('pages.houses.header.button')</a>
            </div>
        </div>
    </div>
    <section id="houses_catalog">
        <div class="container">
            <div class="catalog">
                @if($houses->isEmpty())
                    <div>@lang('pages.houses.empty')</div>
                @else
                    @foreach($houses as $house)
                        <div class="card_noshadow">
                            <div class="card_img_box">
                                <img src="{{ $house->getHouseImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $house->name }}">
                            </div>
                            <div class="card_info_10">
                                <div class="card_title">{{ $house->name }}</div>
                                <div class="card_line">
                                    <div class="card_line_label">@lang('pages.houses.card.capacity')</div>
                                    <div class="card_line_value">@lang('pages.houses.card.up') {{ $house->capacity }} @lang('pages.houses.card.people') </div>
                                </div>
                                <div class="card_line">
                                    <div class="card_price">{{ $house->price }} {{ $house->unit->label() }}</div>
                                    <button class="card_button">
                                        <a href="{{ route('house', ['id' => $house->id]) }}" class="card_a">@lang('pages.houses.button')</a>
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
    <script>
        $(document).ready(() => {
            $('.houses_button').addClass('active_header_button');
            new WOW().init();
        });
    </script>
@endsection
