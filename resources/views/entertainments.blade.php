@extends('layout.app')

@section('title', 'Развлечения')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="page_content">
            <h2>@lang('pages.entertainments.title')</h2>
            <div class="catalog">
                @if($entertainments->isEmpty())
                    <div>@lang('pages.entertainments.empty')</div>
                @else
                    @foreach($entertainments as $entertainment)
                        <div class="item wow animate__animated animate__fadeInUp">
                            <div class="item_img_container">
                                <img src="{{ $entertainment->getEntertainmentImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото развлечения">
                            </div>
                            <div class="item_name">{{ $entertainment->name }}</div>
                            <div class="item_desc">{{ $entertainment->description }}</div>
                            <div class="item_price">{{ $entertainment->price > 0? $entertainment->price . ' ' . $entertainment->unit->label() : 'Бесплатно' }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        $(".b_entertainments").addClass("active_btn");
        $(document).ready(() => {
            new WOW().init();
        });
    </script>
@endsection
