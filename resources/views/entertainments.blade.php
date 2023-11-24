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
            <div class="page_header_title">@lang('pages.entertainments.title')</div>
            <div class="page_header_text">В нашей деревне есть всё: от спокойного плавания на лодках до экстремальных прогулок по лесу</div>
            <div class="page_header_buttons">
                <a href="#entertainments_catalog" class="page_header_button">Посмотреть все</a>
            </div>
        </div>
    </div>
    <section id="entertainments_catalog">
        <div class="container">
            <div class="catalog">
                @if($entertainments->isEmpty())
                    <div>@lang('pages.main.entertainments.empty')</div>
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
