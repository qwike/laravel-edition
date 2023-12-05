<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">@lang('pages.houses_main.title')</div>
            <a class="button_section_more" href="{{ route('houses') }}">
                @lang('pages.houses_main.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">@lang('pages.houses_main.description')</div>
        <div class="catalog">
            @if($houses->isEmpty())
                <div>@lang('pages.houses_main.empty')</div>
            @else
                @foreach($houses as $house)
                    <div class="card_noshadow">
                        <div class="card_img_box">
                            <img src="{{ $house->getHouseImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $house->name }}">
                        </div>
                        <div class="card_info_10">
                            <div class="card_title">{{ $house->name }}</div>
                            <div class="card_line">
                                <div class="card_line_label">@lang('pages.houses.card.capacity')</div>
                                <div class="card_line_value"> @lang('pages.houses.card.up')  {{ $house->capacity }} @lang('pages.houses.card.people')</div>
                            </div>
                            <div class="card_line">
                                <div class="card_price">{{ $house->price }} {{ $house->unit->label() }}</div>
                                <button class="card_button">
                                    <a href="{{ route('house', ['id' => $house->id]) }}" class="card_a">@lang('pages.houses.button')</a>
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


