<div class="container mt">
    <div class="wow animate__animated animate__fadeIn">
        <div class="header">@lang('pages.main.events.title')</div>
        <div class="text">@lang('pages.main.events.description')</div>
    </div>
    <div class="event_slider_box">
        <div id="event_prev_arrow" class="arrow"><</div>
        <div class="event_track_box">
            <div class="events" id="event_slider">
                @if($events->isEmpty())
                    <div>@lang('pages.main.events.empty')</div>
                @else
                    @foreach($events as $event)
                        <div class="event wow animate__animated animate__fadeInUp">
                            <div class="box"><img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Мероприятие"></div>
                            <div class="tour_header">{{ $event->name }}</div>
                            <div class="tour_text">{{ substr($event->description, 0, 60)."..." }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div id="event_next_arrow" class="arrow">></div>
    </div>
    <div style="float: right; margin-top: 15px">
        <a href="{{ route('events') }}" class="page_link">@lang('pages.main.events.button')</a>
    </div>
</div>
<div class="container mt">
    <div class="flex_space_between">
        <div class="wow animate__animated animate__fadeIn">
            <div class="header">@lang('pages.main.weddings.title')</div>
            <div class="text">@lang('pages.main.weddings.description')</div>
            <div style="margin-top: 20px">
                <a href="events.php" class="page_link">@lang('pages.main.weddings.button')</a>
            </div>
        </div>
        <img src="{{ asset('/images/marry.jpg') }}" alt="Свадьбы" class="marry_img wow animate__animated animate__zoomIn">
    </div>
</div>
