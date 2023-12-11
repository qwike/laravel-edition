@extends('layout.app')

@section('title', 'Проекты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/projects.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_projects">
        <div class="container">
            <div class="page_header_title">@lang('pages.investors.header.title')</div>
            <div class="page_header_text">@lang('pages.investors.header.description')</div>
            <div class="page_header_buttons">
                <a href="#projects_catalog" class="page_header_button animate__animated animate__fadeIn">@lang('pages.investors.header.button')</a>
            </div>
        </div>
    </div>
    <section id="projects_catalog">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="catalog">
                @if($projects->isEmpty())
                    <div>@lang('pages.investors.empty')</div>
                @else
                    @foreach($projects as $project)
                        <div class="card">
                            <div class="card_img_box">
                                <img src="{{ $project->getProjectImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $project->name }}">
                            </div>
                            <div class="card_info">
                                <div class="card_title">{{ $project->name }}</div>
                                <div class="card_description">{{ $project->description }}</div>
                                @if($project->date)
                                    <div class="card_line">
                                        <div class="card_line_label">Дата:</div>
                                        <div class="card_line_value">{{ $project->date }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <script>
        $(document).ready(() => {
            $('.projects_button').addClass('active_header_button');
            new WOW().init();
        });
    </script>
@endsection

