<div class="container mt">
    <div class="flex_space_between">
        <div class="text_box wow animate__animated animate__fadeIn" id="learn_more">
            <div class="header">@lang('pages.main.excursions.title')</div>
            <div class="text">@lang('pages.main.excursions.description')</div>
        </div>
        <div class="tours_slider_box wow animate__animated animate__fadeInRight">
            <div id="tour_prev_arrow" class="arrow"><</div>
            <div class="track_box">
                <div class="tours" id="tour_slider">
                    @if($excursions->isEmpty())
                        <div>@lang('pages.main.excursions.empty')</div>
                    @else
                        @foreach($excursions as $excursion)
                            <div class="tour">
                                <div class="box"><img src="{{ $excursion->getExcursionImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Экскурсия"></div>
                                <div class="tour_header">{{ $excursion->name }}</div>
                                <div class="tour_text">{{ substr($excursion->description, 0, 58) . "..." }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div id="tour_next_arrow" class="arrow">></div>
        </div>
    </div>
    <div style="float: right; margin-top: 15px">
        <a href="{{ route('excursions') }}" class="page_link">@lang('pages.main.excursions.button')</a>
    </div>
</div>
