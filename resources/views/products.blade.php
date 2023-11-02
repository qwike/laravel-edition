@extends('layout.app')

@section('title', 'Молочная продукция')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection


@section('content')
    <div class="container mt">
        <div class="page_content">
            <h2>Молочная продукция</h2>
            <div class="information_block" style="margin-top: 25px;">
                <p>Мувырский молокозавод производит молочную продукцию, полученную из отборного молока своих коров,</p>
                <p>что гарантирует высокую степень качества на всех этапах производства</p>
            </div>
            <div class="information_block" style="margin-top: 25px;">Ознакомьтесь с нашей продукцией</div>

            <div class="catalog" style="margin-top: 25px">
            @if($products->isEmpty())
                <div>Не удлаось загрузить молочную продукцию(</div>
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
            <h2 style="margin-top: 50px;">Покупать Здесь</h2>
            <div class="information_block">Адреса торговых точек в г. Ижевск где вы можете приобрести продукцию мувырского молокозавода</div>
{{--            @dd($addresses)--}}

            @if($addresses->isEmpty())
                <div>Не удлаось загрузить адреса магазинов(</div>
            @else
                @foreach($addresses as $adress)
                    <div class="item_title">{{ $adress->name }}</div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        $("#milk").addClass("active_header_btn")
    </script>
    <script src="assets/js/wow.min.js"></script>
    <script>
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection





