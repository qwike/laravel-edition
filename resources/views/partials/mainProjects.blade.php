<div class="container mt">
    <div class="goals_title">@lang('pages.main.projects.title')</div>
    <div class="goals">
        @if($projects->isEmpty())
            <div>@lang('pages.main.projects.empty')</div>
        @else
            @foreach($projects as $project)
                <div class="goal wow animate__animated animate__backInUp">
                    <div class="goal_img_container">
                        <img src="{{ $project->getProjectImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото проекта">
                    </div>
                    <div class="goal_text">
                        <div class="goal_header">{{ $project->name }}</div>
                        <div class="text">{{ $project->description }}</div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="investors">@lang('pages.main.projects.description')</div>
</div>
