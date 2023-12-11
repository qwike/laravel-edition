@extends('layout.app')

@section('title', 'История Мувыра')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/twentytwenty.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_history">
        <div class="container">
            <div class="page_header_title">@lang('pages.history.header.title')</div>
            <div class="page_header_text">@lang('pages.history.header.description')</div>
            <div class="page_header_buttons">
                <a href="#history" class="page_header_button animate__animated animate__fadeIn">@lang('pages.history.header.button')</a>
            </div>
        </div>
    </div>
    <section id="history">
        <div class="container">
            <div class="history_text">
                <p class="wow animate__animated animate__fadeIn">
                    @lang('pages.history.text_1')
                </p>
                <div class="columns_container">
                    <p class="wow animate__animated animate__fadeIn">
                        @lang('pages.history.text_2')
                    </p>
                    <div class="comparison">
                        <img src="{{ asset('/images/about3.png') }}" alt="@lang('pages.history.image_alt_1')">
                        <img src="{{ asset('/images/new1.jpg') }}" alt="@lang('pages.history.image_alt_2')">
                    </div>
                </div>
                <p class="wow animate__animated animate__fadeIn">
                    @lang('pages.history.text_3')
                </p>
                <div class="quote">
                    <blockquote>
                        <span>❝</span>
                        <p>@lang('pages.history.quote_1')</p>
                        <cite>@lang('pages.history.author')</cite>
                    </blockquote>
                </div>
                <div class="columns_container">
                    <div class="comparison">
                        <img src="{{ asset('/images/old1.jpg') }}" alt="@lang('pages.history.image_alt_1')">
                        <img src="{{ asset('/images/new2.png') }}" alt="@lang('pages.history.image_alt_2')">
                    </div>
                    <p class="wow animate__animated animate__fadeIn">@lang('pages.history.text_4')</p>
                </div>
                <p class="wow animate__animated animate__fadeIn">@lang('pages.history.text_5')</p>
                <div class="columns_container">
                    <p class="wow animate__animated animate__fadeIn">@lang('pages.history.text_6')</p>
                    <div class="history_img_box wow animate__animated animate__zoomIn"">
                        <img src="{{ asset('/images/most.jpg') }}" alt="@lang('pages.history.image_alt_3')">
                    </div>
                </div>
                <div class="quote">
                    <blockquote>
                        <span>❝</span>
                        <p>@lang('pages.history.quote_2')</p>
                        <cite>@lang('pages.history.author')</cite>
                    </blockquote>
                </div>
                <p class="wow animate__animated animate__fadeIn">@lang('pages.history.text_7')</p>
                <div class="columns_container">
                    <div class="history_img_box wow animate__animated animate__zoomIn">
                        <img src="{{ asset('/images/korepanov.png') }}" alt="@lang('pages.history.image_alt_4')">
                    </div>
                    <div class="quote">
                        <blockquote>
                            <span>❝</span>
                            <p>@lang('pages.history.quote_3')</p>
                            <cite>@lang('pages.history.author')</cite>
                        </blockquote>
                    </div>
                </div>
                <p class="wow animate__animated animate__fadeIn">@lang('pages.history.text_8')</p>
                <div class="history_img_box wow animate__animated animate__zoomIn"">
                    <img src="{{ asset('/images/historylast.jpg') }}" alt="@lang('pages.history.image_alt_1')">
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('/js/jquery.twentytwenty.js') }}"></script>
    <script>
        $(document).ready(() => {
            $(".comparison").twentytwenty({
                default_offset_pct: 0.5,
                orientation: 'horizontal',
                before_label: "@lang('pages.history.before_label')",
                after_label: "@lang('pages.history.after_label')",
                no_overlay: false,
                move_with_handle_only: true,
                click_to_move: false,
            });

            $('.history_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
