@extends('layout.app')

@section('title', 'Развлечения')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_entertainments">
        <div class="container">
            <div class="page_header_title">@lang('pages.entertainment.header.title')</div>
            <div class="page_header_text">@lang('pages.entertainment.header.description')</div>
            <div class="page_header_buttons">
                <a href="#entertainments_catalog" class="page_header_button animate__animated animate__fadeIn">@lang('pages.entertainment.header.button')</a>
            </div>
        </div>
    </div>
    <section id="entertainments_catalog">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="catalog">
                @if($entertainments->isEmpty())
                    <div>@lang('pages.entertainment.empty')</div>
                @else
                    @foreach($entertainments as $entertainment)
                        <div class="card">
                            <div class="card_img_box">
                                <img src="{{ $entertainment->getEntertainmentImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $entertainment->name }}">
                            </div>
                            <div class="card_info">
                                <div class="card_title">{{ $entertainment->name }}</div>
                                <div class="card_description">{{ $entertainment->description }}</div>
                                <div class="card_line">
                                    <div class="card_price">{{ $entertainment->price == 0? 'БЕСПЛАТНО' : $entertainment->price . ' ' . $entertainment->unit->label() }}</div>
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
            $('.entertainments_button').addClass('active_header_button');
            new WOW().init();
        });
    </script>
@endsection
