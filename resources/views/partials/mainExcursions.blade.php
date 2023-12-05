<section>
    <div class="container">
        <div class="section_header">
            <div class="section_title">@lang('pages.excursions_main.title')</div>
            <a class="button_section_more" href="{{ route('excursions') }}">
                @lang('pages.excursions_main.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">@lang('pages.excursions_main.description')</div>
        <div class="catalog">
            @if($excursions->isEmpty())
                <div>@lang('pages.excursions_main.empty')</div>
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
                                <div class="card_price">{{ $excursion->price > 0? 'От ' . $excursion->price . '₽ ' : 'БЕСПЛАТНО' }}</div>
                                <button class="card_button orderable"
                                        data-position-name="{{ $excursion->name }}"
                                        data-position-price="{{ 'От ' . $excursion->price > 0? $excursion->price . '₽ ' : 'БЕСПЛАТНО' }}"
                                        data-orderable-type="{{ \App\Enums\OrderTypeEnum::from(\App\Models\Excursion::class)->name }}"
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
