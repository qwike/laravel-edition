<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">Кафе</div>
            <a class="button_section_more" href="{{ route('cafe') }}">
                Больше мероприятий
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">В нашем уютном кафе вы можете провести любое мероприятие. Наша команда профессионалов позаботиться об организации</div>
        <div class="catalog cafe_catalog">
            @if($cafeEvents->isEmpty())
                <div>@lang('pages.main.events.empty')</div>
            @else
                @foreach($cafeEvents as $cafeEvent)
                    <div class="card cafe_card">
                        <div class="card_img_box cafe_card_img_box">
                            <img src="{{ $cafeEvent->getCafeEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $cafeEvent->name }}">
                        </div>
                        <div class="card_info">
                            <div class="card_title">{{ $cafeEvent->name }}</div>
                            <div class="card_description">{{ $cafeEvent->description }}</div>
                            <div class="card_line">
                                <button class="card_button orderable"
                                        data-position-name="{{ $cafeEvent->name }}"
                                        data-position-price="Договорная"
                                        data-orderable-type="{{ \App\Enums\OrderTypeEnum::from(\App\Models\CafeEvent::class)->name }}"
                                        data-orderable-id="{{ $cafeEvent->id }}">
                                    Оставить заявку
                                    <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

