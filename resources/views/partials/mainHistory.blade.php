<div class="container">
    <div class="history_container">
        <div class="history_image_box">
            <img src="{{ asset('/images/history.png') }}" alt="@lang('pages.history_main.alt')">
        </div>
        <div class="history_info">
            <div class="section_title">@lang('pages.history_main.title')</div>
            <div class="history_text">
                @lang('pages.history_main.description')
            </div>
            <a class="button_section_more" href="{{ route('history') }}">
                @lang('pages.history_main.button')
                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
            </a>
        </div>
    </div>
</div>
