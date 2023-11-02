<div class="container mt">
    <div class="goals_title">Инвесторам</div>
    <div class="goals">
        @if($projects->isEmpty())
            <div>В данный момент здесь пусто :(</div>
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
    <div class="investors">Инвестируя в возрожденную деревню Мувыр, вы не только получите выгоду и прибыль, но и внесете значимый вклад в развитие этого прекрасного места. Мы гарантируем прозрачность, надежность и сотрудничество на взаимовыгодных условиях. </div>
</div>
