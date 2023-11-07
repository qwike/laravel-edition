<div class="container" style="margin-block: 30px;">
    <div class="flex_space_between">
        <div class="his_img_box">
            <img src="{{ asset('/images/his.png') }}" alt="История">
        </div>
        <div class="his_text wow animate__animated animate__fadeIn">
            <div class="header">@lang('pages.main.history.title')</div>
            <div class="text">@lang('pages.main.history.description')</div>
            <div style="margin-top: 20px">
                <a href="{{ route('history') }}" class="page_link">@lang('pages.main.history.button')</a>
            </div>
        </div>
    </div>
</div>
