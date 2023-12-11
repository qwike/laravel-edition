@extends('layout.app')

@section('title', 'Контакты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/contacts.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_contacts">
        <div class="container">
            <div class="page_header_title">@lang('pages.contacts.header.title')</div>
            <div class="page_header_text">@lang('pages.contacts.header.description')</div>
            <div class="page_header_buttons">
                <a href="#contacts_catalog" class="page_header_button animate__animated animate__fadeIn">@lang('pages.contacts.header.button')</a>
            </div>
        </div>
    </div>
    <section id="contacts_catalog">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="information_block">
                @lang('pages.contacts.text')
            </div>
            <div class="information_block" style="margin-top: 25px;">
                <span>@lang('pages.contacts.schedule')</span>
            </div>
            <div class="information_block wow animate__animated animate__fadeIn" data-wow-delay="0.1s" style="margin-top: 25px;">
                <span>@lang('pages.contacts.cafe.label')</span> @lang('pages.contacts.cafe.value')
            </div>
            <div class="information_block wow animate__animated animate__fadeIn" data-wow-delay="0.2s" style="margin-top: 25px;">
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
