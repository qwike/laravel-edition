<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">@lang('pages.events_main.title')</div>
            <a class="button_section_more" href="{{ route('events') }}">
                @lang('pages.events_main.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">@lang('pages.events_main.description')</div>
        <div class="catalog">
            @if($events->isEmpty())
                <div>@lang('pages.events_main.empty')</div>
            @else
                @foreach($events as $event)
                    <div class="card_noshadow">
                        <div class="card_img_box">
                            <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $event->name }}">
                        </div>
                        <div class="card_info_10">
                            <div class="card_title">{{ $event->name }}</div>
                            <div class="card_line">
                                <div class="card_line_label">@lang('pages.events_main.event_time')</div>
                                <div class="card_line_value">{{ $event->date }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

