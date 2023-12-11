<section>
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section_header">
            <div class="section_title">@lang('pages.main.projects.title')</div>
            <a class="button_section_more" href="{{ route('projects') }}">
                @lang('pages.main.projects.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">@lang('pages.main.projects.description')</div>
        <div class="catalog cafe_catalog">
            @if($projects->isEmpty())
                <div>@lang('pages.main.projects.empty')</div>
            @else
                @foreach($projects as $project)
                    <div class="card cafe_card">
                        <div class="card_img_box cafe_card_img_box">
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

