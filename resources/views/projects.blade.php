@extends('layout.app')

@section('title', 'Наши проекты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="header">@lang('pages.projects.title')</div>
        <div class="catalog">
            @if($projects->isEmpty())
                <div>@lang('pages.projects.empty')</div>
            @else
                @foreach($projects as $project)
                    <div class="item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <div class="item_img_container">
                            <img src="{{ $project->getProjectImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото проекта">
                        </div>
                        <div class="item_title">{{ $project->name }}</div>
                        <div class="item_desc">{{ $project->description }}</div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
        $(".b_projects").addClass("active_btn")
        new WOW().init();
    </script>
@endsection
