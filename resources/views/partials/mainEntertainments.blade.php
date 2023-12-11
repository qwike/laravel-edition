<section>
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section_header">
            <div class="section_title">@lang('pages.main.entertainments.title')</div>
            <a class="button_section_more" href="{{ route('entertainments') }}">
                @lang('pages.main.entertainments.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
        <div class="section_description">@lang('pages.main.entertainments.description')</div>
        <div class="catalog">
            @if($entertainments->isEmpty())
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
