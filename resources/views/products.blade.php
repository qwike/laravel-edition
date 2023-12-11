@extends('layout.app')

@section('title', 'Молочная продукция')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/products.css') }}">
@endsection


@section('content')
    <div class="page_header" id="page_header_products">
        <div class="container">
            <div class="page_header_title">@lang('pages.production.header.title')</div>
            <div class="page_header_text">@lang('pages.production.header.description')</div>
            <div class="page_header_buttons">
                <a href="#products_catalog" class="page_header_button animate__animated animate__fadeIn">@lang('pages.production.header.button')</a>
            </div>
        </div>
    </div>
    <section id="products_catalog">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section_header">
                <div class="section_title">@lang('pages.production.title')</div>
            </div>
            <div class="catalog">
                @if($products->isEmpty())
                    <div>@lang('pages.production.empty')</div>
                @else
                    @foreach($products as $product)
                        <div class="card">
                            <div class="card_img_box">
                                <img src="{{ $product->getProductImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $product->name }}">
                            </div>
                            <div class="card_info">
                                <div class="card_title">{{ $product->name }}</div>
                                <div class="card_description">{{ $product->description }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section_header">
                <div class="section_title">@lang('pages.production.shops.title')</div>
            </div>
            <div class="map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6f2470d58dd6258668fc96ae66fe2bfd452b01689a07b06b48d4c31968a507b3&amp;width=100%&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
        <div class="container">
            <div class="catalog addresses_catalog">
                @if($addresses->isEmpty())
                    <div>@lang('pages.production.shops.empty')</div>
                @else
                    @foreach($addresses as $address)
                        <div class="address">{{ $address->name }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <script>
        $(document).ready(() => {
            $('.products_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection





