<div class="container wow animate__animated animate__fadeIn">
    <div class="history_container">
        <div class="history_image_box">
            <img src="{{ asset('/images/history.png') }}" alt="@lang('pages.main.history.alt')">
        </div>
        <div class="history_info">
            <div class="section_title">@lang('pages.main.history.title')</div>
            <div class="history_text">
                @lang('pages.main.history.description')
            </div>
            <a class="button_section_more" href="{{ route('history') }}">
                @lang('pages.main.history.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
    </div>
</div>
