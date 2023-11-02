<div class="container mt">
    <div class="wow animate__animated animate__fadeIn">
        <div class="header">Мероприятия</div>
        <div class="text">Мы предлагаем множество чудесных мероприятий</div>
    </div>
    <div class="event_slider_box">
        <div id="event_prev_arrow" class="arrow"><</div>
        <div class="event_track_box">
            <div class="events" id="event_slider">
                @if(empty($events))
                    <div>В данный момент нет мероприятий :(</div>
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
        <a href="events.php" class="page_link">Все Мероприятия</a>
    </div>
</div>
<div class="container mt">
    <div class="flex_space_between">
        <div class="wow animate__animated animate__fadeIn">
            <div class="header">Организация Свадеб</div>
            <div class="text">Мы предлагаем уникальную возможность создать незабываемое свадебное торжество в живописной деревне Мувыр. Наша команда профессионалов занимается всеми аспектами организации свадебного мероприятия, начиная от выбора идеального места для проведения церемонии и банкета до оформления и развлекательной программы</div>
            <div style="margin-top: 20px">
                <a href="events.php" class="page_link">Все Мероприятия</a>
            </div>
        </div>
        <img src="{{ asset('/images/marry.jpg') }}" alt="Свадьбы" class="marry_img wow animate__animated animate__zoomIn">
    </div>
</div>
