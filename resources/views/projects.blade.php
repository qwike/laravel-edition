@extends('layout.app')

@section('title', 'Проекты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/projects.css') }}">
@endsection

@section('content')
    <div class="page_header">
        <div class="container">
            <div class="page_header_title">Наши проекты</div>
            <div class="page_header_text">Мувыр предлагает уникальные инвестиционные возможности в проекты развития деревни, где Вы сможете вложить свои средства в устойчивое развитие и создание благоприятной экосистемы.</div>
            <div class="page_header_buttons">
                <a href="#projects_catalog" class="page_header_excursions_button">Посмотреть все</a>
            </div>
        </div>
    </div>
    <section id="projects_catalog">
        <div class="container">
            <div class="catalog">
                @if($projects->isEmpty())
                    <div>В данный момент нет проектов</div>
                @else
                    @foreach($projects as $project)
                        <div class="card">
                            <div class="card_img_box">
                                <img src="{{ $project->getProjectImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $project->name }}">
                            </div>
                            <div class="card_info">
                                <div class="card_title">{{ $project->name }}</div>
                                <div class="card_description">{{ $project->description }}</div>
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

