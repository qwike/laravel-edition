<div class="container">
    <div class="section_header">
        <div class="section_title">@lang('pages.product_main.title')</div>
        <a class="button_section_more" href="{{ route('products') }}">
            @lang('pages.product_main.button')
            <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
        </a>
    </div>
    <div class="section_description">@lang('pages.product_main.description')</div>
    <div class="products_images">
        <div class="product_image_box">
            <img src="{{ asset('/images/milk.jpg') }}" alt="@lang('pages.product_main.alt')">
        </div>
        <div class="product_image_box">
            <img src="{{ asset('/images/milk2.jpg') }}" alt="@lang('pages.product_main.alt')">
        </div>
        <div class="product_image_box">
            <img src="{{ asset('/images/milk3.jpg') }}" alt="@lang('pages.product_main.alt')">
        </div>
        <div class="product_image_box">
            <img src="{{ asset('/images/milk4.jpg') }}" alt="@lang('pages.product_main.alt')">
        </div>
    </div>
</div>
