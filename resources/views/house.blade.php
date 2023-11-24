@extends('layout.app')

@section('title', $house->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/house.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endsection

@section('content')
    <section style="padding-top: 100px">
        <div class="container">
            <div class="columns_container">
                <div class="house_images_slider_box">
                    <div id="prevArrow" class="images_slider_arrow"><</div>
                    <div class="house_images_slider" id="house_images_slider">
                        @php($images = $house->getHouseImages())
                        @if($images->isEmpty())
                            <div class="house_slider_img_box">
                                <img src="{{ \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $house->name }}" class="slider_img">
                            </div>
                        @else
                            @foreach($images as $image)
                                <div class="house_slider_img_box">
                                    <img src="{{ $image?->getUrl() }}" alt="{{ $house->name }}" class="slider_img">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div id="nextArrow" class="images_slider_arrow">></div>
                </div>
                <div class="house_info">
                    <div class="house_title">{{ $house->name }}</div>
                    <p class="house_description">{{ $house->description }}</p>
                    <p>{{ $house->price . ' ' . $house->unit->label() }}</p>
                    <p>Вместимость: до {{ $house->capacity }} человек</p>
                    <button
                            class="btn_order orderable"
                            data-position-name="{{ $house->name }}"
                            data-position-price="{{ $house->price . ' ' . $house->unit->label() }}"
                            data-orderable-type="{{ \App\Enums\OrderTypeEnum::from(\App\Models\House::class)->name }}"
                            data-orderable-id="{{ $house->id }}">
                        @lang('pages.house.button')
                        <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
                    </button>
                </div>
            </div>
        </div>
    </section>
    @include('partials.formModalContainer')
    <script src="{{ asset('/js/slick.js') }}"></script>
    <script>
        $(document).ready(() => {
            $('#house_images_slider').slick({
                dots: false,
                arrows: true,
                prevArrow: '#prevArrow',
                nextArrow: '#nextArrow',
                centerMode: true,
            });
        });
    </script>
@endsection
