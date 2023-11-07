<div class="container">
    <div class="flex_space_between">
        <div class="wow animate__animated animate__fadeIn">
            <div class="header">@lang('pages.main.contacts.title')</div>
            <div class="text">
                <br>@lang('pages.main.contacts.address_label') @lang('pages.address')
                <br>@lang('pages.main.contacts.phone_label') <a href="tel:+79018658755">@lang('pages.phone_number')</a>
                <br>@lang('pages.main.contacts.vk_label') <a href="https://vk.com/weekendvmywer">@lang('pages.group')</a>
            </div>
            <div style="margin-block: 20px">
                <a href="{{ route('contacts') }}" class="page_link">@lang('pages.main.contacts.button')</a>
            </div>
        </div>
    </div>
</div>
