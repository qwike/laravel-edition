<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">Развлечения</div>
            <a class="button_section_more" href="{{ route('entertainments') }}">
                Все развлечения
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">Мы предлагаем большой спектр развлечений для детей и взрослых</div>
        <div class="catalog">
            @if($excursions->isEmpty())
                <div>@lang('pages.main.entertainments.empty')</div>
            @else
                @foreach($entertainments as $entertainment)
                    <div class="card">
                        <div class="card_img_box">
                            <img src="{{ $entertainment->getEntertainmentImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $entertainment->name }}">
                        </div>
                        <div class="card_info">
                            <div class="card_title">{{ $entertainment->name }}</div>
                            <div class="card_description">{{ $entertainment->description }}</div>
                            <div class="card_line">
                                <div class="card_price">{{ $entertainment->price == 0? 'БЕСПЛАТНО' : $entertainment->price . ' ' . $entertainment->unit->label() }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
