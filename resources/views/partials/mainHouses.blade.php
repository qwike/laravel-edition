<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">Гостевые домики</div>
            <a class="button_section_more" href="{{ route('houses') }}">
                Все домики
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">Мы предлагаем вам остановиться в наших уютных гостевых домиках</div>
        <div class="catalog">
            @if($houses->isEmpty())
                <div>@lang('pages.main.houses.empty')</div>
            @else
                @foreach($houses as $house)
                    <div class="card_noshadow">
                        <div class="card_img_box">
                            <img src="{{ $house->getHouseImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $house->name }}">
                        </div>
                        <div class="card_info_10">
                            <div class="card_title">{{ $house->name }}</div>
                            <div class="card_line">
                                <div class="card_line_label">Вместимость:</div>
                                <div class="card_line_value">до 4 человек</div>
                            </div>
                            <div class="card_line">
                                <div class="card_price">{{ $house->price }} {{ $house->unit->label() }}</div>
                                <button class="card_button orderable"
                                        data-position-name="{{ $house->name }}"
                                        data-position-price="{{ $house->price }} {{ $house->unit->label() }}"
                                        data-orderable-type="houses"
                                        data-orderable-id="{{ $house->id }}">
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


