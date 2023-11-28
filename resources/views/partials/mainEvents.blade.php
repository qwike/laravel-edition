<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">Мероприятия</div>
            <a class="button_section_more" href="{{ route('events') }}">
                Все мероприятия
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">Ежегодно в нашей деревне проводятся разного рода мероприятия</div>
        <div class="catalog">
            @if($events->isEmpty())
                <div>@lang('pages.main.events.empty')</div>
            @else
                @foreach($events as $event)
                    <div class="card_noshadow">
                        <div class="card_img_box">
                            <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $event->name }}">
                        </div>
                        <div class="card_info_10">
                            <div class="card_title">{{ $event->name }}</div>
                            <div class="card_line">
                                <div class="card_line_label">Время проведения:</div>
                                <div class="card_line_value">{{ $event->date }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

