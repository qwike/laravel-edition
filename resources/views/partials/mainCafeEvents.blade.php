<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">@lang('pages.cafe_main.title')</div>
            <a class="button_section_more" href="{{ route('cafe') }}">
                @lang('pages.cafe_main.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">@lang('pages.cafe_main.description')</div>
        <div class="catalog cafe_catalog">
            @if($cafeEvents->isEmpty())
                <div>@lang('pages.cafe_main.empty')</div>
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
                                        data-position-price="@lang('pages.cafe_main.card.data-position-price')"
                                        data-orderable-type="{{ \App\Enums\OrderTypeEnum::from(\App\Models\CafeEvent::class)->name }}"
                                        data-orderable-id="{{ $cafeEvent->id }}">
                                    @lang('pages.cafe_main.card.button')
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

