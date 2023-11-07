<div class="container mt">
    <div class="wow animate__animated animate__fadeIn">
        <div class="header">@lang('pages.main.entertainments.title')</div>
        <div class="text">@lang('pages.main.entertainments.description')</div>
    </div>
    <div class="entertainments" style="margin-top: 20px;">
        @foreach($entertainments as $entertainment)
            <div class="entertainment_img_container wow animate__animated animate__slideInUp">
                <img src="{{ $entertainment->getEntertainmentImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="{{ $entertainment->name }}">
            </div>
        @endforeach
    </div>
    <div style="float: right; margin-top: 15px">
        <a href="{{ route('entertainments') }}" class="page_link">@lang('pages.main.entertainments.button')</a>
    </div>
</div>
