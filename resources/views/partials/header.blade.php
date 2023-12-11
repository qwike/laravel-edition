<div class="container">
    <div class="header_top">
        <a class="logo_group" href="{{ route('home') }}">
            <img src="{{ asset('/images/logo.png') }}" alt="Мувыр" class="logo_img">
            <div class="logo_text">@lang('pages.header.logo')</div>
        </a>
        <div class="socials_group">
            <div class="socials_text">@lang('pages.header.socials')</div>
            <div class="socials">
                <a href="https://vk.com/weekendvmywer" target="_blank">
                    <div class="social_box vk_box">
                        <img src="{{ asset('/images/vk.svg') }}" alt="@lang('pages.header.vk')">
                    </div>
                </a>
                <a href="https://t.me/mariaprokofeva" target="_blank">
                    <div class="social_box telegram_box">
                        <img src="{{ asset('/images/telegram.svg') }}" alt="@lang('pages.header.telegram')">
                    </div>
                </a>
                <a href="https://wa.me/+79018658755" target="_blank">
                    <div class="social_box whatsapp_box">
                        <img src="{{ asset('/images/whatsapp.svg') }}" alt="@lang('pages.header.whatsup')">
                    </div>
                </a>
                <a href="viber://chat?number=%2B79018658755" target="_blank">
                    <div class="social_box viber_box">
                        <img src="{{ asset('/images/viber.svg') }}" alt="@lang('pages.header.viber')">
                    </div>
                </a>
            </div>
        </div>
        <a class="free_call" href="tel:@lang('pages.phone_number_compressed')">
            <img src="{{ asset('/images/phone.svg') }}" alt="@lang('pages.header.button')" style="margin-right: 5px;">
            @lang('pages.header.button')
        </a>
        <div class="phone_group">
            <a class="phone_number" href="tel:@lang('pages.phone_number_compressed')">@lang('pages.phone_number')</a>
            <p class="phone_desc">@lang('pages.header.phone_description')</p>
        </div>
        <div class="burger_box" data-open="{{ asset('/images/burger.svg') }}" data-close="{{ asset('/images/close.svg') }}">
            <img src="{{ asset('/images/burger.svg') }}" alt="@lang('pages.header.burger_alt')">
        </div>
    </div>
</div>
<div class="container header_menu">
    <div class="header_menu_buttons">
        <a href="{{ route('home') }}" class="header_button home_button">@lang('pages.header.main')</a>
        <a href="{{ route('history') }}" class="header_button history_button">@lang('pages.header.history')</a>
        <a href="{{ route('excursions') }}" class="header_button excursions_button">@lang('pages.header.excursions')</a>
        <a href="{{ route('events') }}" class="header_button events_button">@lang('pages.header.events')</a>
        <a href="{{ route('cafe') }}" class="header_button cafe_button">@lang('pages.header.cafe')</a>
        <a href="{{ route('houses') }}" class="header_button houses_button">@lang('pages.header.houses')</a>
        <a href="{{ route('entertainments') }}" class="header_button entertainments_button">@lang('pages.header.entertainments')</a>
        <a href="{{ route('products') }}" class="header_button products_button">@lang('pages.header.production')</a>
        <a href="{{ route('gallery') }}" class="header_button gallery_button">@lang('pages.header.gallery')</a>
        <a href="{{ route('projects') }}" class="header_button projects_button">@lang('pages.header.investors')</a>
        <a href="{{ route('contacts') }}" class="header_button contacts_button">@lang('pages.header.contacts')</a>
    </div>
</div>
