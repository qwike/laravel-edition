@extends('layout.app')

@section('title', 'Мероприятия')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">@lang('pages.events.title')</div>
        <div class="catalog">
            @if($events->isEmpty())
                <div>@lang('pages.events.empty')</div>
            @else
                @foreach($events as $event)
                    <div class="item wow animate__animated animate__fadeInUp">
                        <div class="item_img_container">
                            <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото домика" second_image="assets/images/event2.jpg">
                        </div>
                        <div class="item_title">{{ $event->name }}</div>
                        <div class="item_price">{{ $event->date }}</div>
                        <div class="item_desc">
                            {{ $event->description }}
                        </div>
                        <div
                            class="item_btn"
                            data-position-name="{{ $event->name }}"
                            data-position-price="Договорная">
                                @lang('pages.events.button')
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @include('partials.formModal')
    <script src="{{ asset('/js/modalForm.js') }}"></script>
    <script>
        $(".b_events").addClass("active_btn")
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
