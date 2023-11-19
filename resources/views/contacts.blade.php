@extends('layout.app')

@section('title', 'Контакты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/contacts.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_contacts">
        <div class="container">
            <div class="page_header_title">@lang('pages.contacts.title')</div>
            <div class="page_header_text">@lang('pages.contacts.description_block_1')</div>
            <div class="page_header_buttons">
                <a href="#contacts_catalog" class="page_header_excursions_button">Посмотреть контакты</a>
            </div>
        </div>
    </div>
    <section id="contacts_catalog">
        <div class="container">
            <div class="information_block" style="margin-top: 25px;">
                @lang('pages.contacts.description_block_2')
                <span>@lang('pages.contacts.operation')</span>
            </div>
            <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.1s" style="margin-top: 25px;">
                <span>@lang('pages.contacts.cafe.label')</span> @lang('pages.contacts.cafe.value')
            </div>
            <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" style="margin-top: 25px;">
                <span>@lang('pages.contacts.boats.label')</span> @lang('pages.contacts.boats.value')
            </div>
        </div>
    </section>
    <script>
        $(document).ready(() => {
            $('.contacts_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
