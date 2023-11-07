<div class="container mt">
    <div class="flex_space_between">
        <div class="milk_text wow animate__animated animate__fadeIn">
            <div class="header">@lang('pages.main.products.title')</div>
            <div class="text">@lang('pages.main.products.description')</div>
            <div style="float: left; margin-top: 30px">
                <a href="{{ route('products') }}" class="page_link">@lang('pages.main.products.button')</a>
            </div>
        </div>
        <div class="milk_img_container wow animate__animated animate__zoomIn">
            <img src="{{ asset('/images/milk.jpg') }}" alt="Молочная продукция" class="milk_img">
        </div>
    </div>
</div>
