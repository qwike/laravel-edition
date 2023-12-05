@extends('layout.app')

@section('title', 'Мероприятия')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_events">
        <div class="container">
            <div class="page_header_title">@lang('pages.events.header.title')</div>
            <div class="page_header_text">@lang('pages.events.header.description')</div>
            <div class="page_header_buttons">
                <a href="#events_catalog" class="page_header_button">@lang('pages.events.header.button')</a>
            </div>
        </div>
    </div>
    <section id="events_catalog">
        <div class="container">
            <div class="catalog">
                @if($events->isEmpty())
                    <div>@lang('pages.events.empty')</div>
                @else
                    @foreach($events as $event)
                        <div class="card_noshadow">
                            <div class="card_img_box">
                                <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $event->name }}">
                            </div>
                            <div class="card_info_10">
                                <div class="card_title">{{ $event->name }}</div>
                                <div class="card_description">{{ $event->description }}</div>
                                <div class="card_line">
                                    <div class="card_line_label">@lang('pages.events.time_spending')</div>
                                    <div class="card_line_value">{{ $event->date }}</div>
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
            $('.events_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
