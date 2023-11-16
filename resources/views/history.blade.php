@extends('layout.app')

@section('title', 'История Мувыра')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/history.css') }}">
@endsection

@section('content')
    <div class="about_content">
        <div class="container">
            <div class="about_image wow animate__animated animate__fadeInDown">
                <img src="{{ asset('/images/muvir_story.jpg') }}">
            </div>
            <h2 style="margin-top: 20px">@lang('pages.history.block_1.title')</h2>
            <div class="about_content_block">
                @lang('pages.history.block_1.text')
                <div class="about_imgs">
                    <div class="about_content_img_side wow animate__animated animate__fadeInLeft">
                        <div class="about_image_side_box">
                            <img class="about_image_side" src="{{ asset('/images/muvir_story1.png') }}">
                        </div>
                        <h3>@lang('pages.history.block_1.image_captions.hockey')</h3>
                    </div>
                    <div class="about_content_img_side">
                        <div class="about_image_side_box wow animate__animated animate__fadeInRight">
                            <img class="about_image_side" src="{{ asset('/images/about3.png') }}">
                        </div>
                        <h3>@lang('pages.history.block_1.image_captions.street')</h3>
                    </div>
                </div>
            </div>
            <h2>@lang('pages.history.block_2.title')</h2>
            <div class="about_content_block">
                @lang('pages.history.block_2.text.1')
                <div class="flex_space_between">
                    <div class="about_content_img_side wow animate__animated animate__zoomIn">
                        <div class="about_image_side_box">
                            <img class="about_image_side" src="{{ asset('/images/about4.jpg') }}">
                        </div>
                        <h3>@lang('pages.history.block_2.image_captions.products')</h3>
                    </div>
                    <div class="about_text_block">@lang('pages.history.block_2.text.2')</div>
                </div>

                <div class="flex_space_between">
                    <div class="about_content_img_side wow animate__animated animate__zoomIn">
                        <div class="about_image_side_box">
                            <img class="about_image_side" src="{{ asset('/images/about5.jpg') }}">
                        </div>
                        <h3>@lang('pages.history.block_2.image_captions.houses')</h3>
                    </div>
                    <div class="about_text_block">@lang('pages.history.block_2.text.3')</div>
                </div>
            </div>
            <h2>@lang('pages.history.block_3.title')</h2>
            <div class="about_content_block">
                @lang('pages.history.block_3.text.1')
                <div class="flex_space_between">
                    <div class="about_content_img_side wow animate__animated animate__bounceIn">
                        <div class="about_image_side_box">
                            <img class="about_image_side" src="{{ asset('/images/korepanov.PNG') }}" style="object-position: top;">
                        </div>
                        <h3>@lang('pages.history.block_3.image_captions.Alexander')</h3>
                    </div>
                    <div class="about_text_block">@lang('pages.history.block_3.text.2')</div>
                </div>
            </div>

            <h2>@lang('pages.history.block_4.title')</h2>
            <div class="about_content_block">@lang('pages.history.block_4.text')</div>
            <div class="about_content_img_side wow animate__animated animate__fadeInUp" style="margin-bottom: 20px;">
                <div class="about_image_side_box ILoveMuvyr">
                    <img class="about_image_side" src="{{ asset('/images/about6.jpg') }}">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            $('.history_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
