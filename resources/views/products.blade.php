@extends('layout.app')

@section('title', 'Молочная продукция')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection


@section('content')
    <div class="container mt">
        <div class="page_content">
            <h2>@lang('pages.products.title')</h2>
            <div class="information_block" style="margin-top: 25px;">
                <p>@lang('pages.products.description')</p>
            </div>
            <div class="catalog" style="margin-top: 25px">
            @if($products->isEmpty())
                <div>@lang('pages.products.empty')</div>
            @else
                @foreach($products as $product)
                    <div class="item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <div class="item_img_container">
                            <img src="{{ $product->getProductImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото Молочной Продукции">
                        </div>
                        <div class="item_title">{{ $product->name }}</div>
                    </div>
                @endforeach
            @endif
            </div>
            <h2 style="margin-top: 50px;">@lang('pages.products.addresses.title')</h2>
            @if($addresses->isEmpty())
                <div>@lang('pages.products.addresses.empty')</div>
            @else
                @foreach($addresses as $adress)
                    <div class="item_title">{{ $adress->name }}</div>
                @endforeach
            @endif
        </div>
    </div>
    <script src="assets/js/wow.min.js"></script>
    <script>
        $(".b_products").addClass("active_btn")
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection





