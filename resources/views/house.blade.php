@extends('layout.app')

@section('title', $house->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/house.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">
@endsection

@section('content')
    <div class="container mt" style="min-height: calc(100vh - 300px)">
        <div class="flex_space_between">
            <div class="house_images">
                <div class="house_img_box">
                    <img src="{{ $house->getHouseImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $house->name }}" id="focusImg">
                </div>
                <div class="house_images_slider_box">
                    <div class="house_images_slider" id="house_images_slider">
                        @foreach($house->getHouseImages() as $image)
                            <div class="house_slider_img_box">
                                <img src="{{ $image?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $house->name }}" class="slider_img">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="house_info">
                <h2>{{ $house->name }}</h2>
                <p>{{ $house->description }}</p>
                <p>{{ $house->price }}</p>
                <div class="order">@lang('pages.house.button')</div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/slick.js') }}"></script>
    <script src="{{ asset('/js/houseSlider.js') }}"></script>
    <script src="{{ asset('/js/focusImage.js') }}"></script>
@endsection