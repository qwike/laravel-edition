<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">Экскурсии</div>
            <a class="button_section_more" href="{{ route('excursions') }}">
                Все экскурсии
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">В нашей деревне есть всё: от спокойного плавания на лодках до экстремальных прогулок по лесу</div>
        <div class="catalog">
            @if($excursions->isEmpty())
                <div>@lang('pages.main.excursions.empty')</div>
            @else
                @foreach($excursions as $excursion)
                    <div class="card">
                        <div class="card_img_box">
                            <img src="{{ $excursion->getExcursionImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $excursion->name }}">
                        </div>
                        <div class="card_info">
                            <div class="card_title">{{ $excursion->name }}</div>
                            <div class="card_description">{{ $excursion->description }}</div>
                            <div class="card_line">
                                <div class="card_price">{{ $excursion->price > 0? $excursion->price . '₽ ' : 'БЕСПЛАТНО' }}</div>
                                <button class="card_button orderable"
                                        data-position-name="{{ $excursion->name }}"
                                        data-position-price="{{ $excursion->price > 0? $excursion->price . '₽ ' : 'БЕСПЛАТНО' }}"
                                        data-orderable-type="excursions"
                                        data-orderable-id="{{ $excursion->id }}">
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
