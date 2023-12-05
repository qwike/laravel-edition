<section>
    <div class="container">
        <div class="contacts_container">
            <div>
                <div class="section_title">@lang('pages.contacts_main.title')</div>
                <div class="contacts_address">
                    <img src="{{ asset('/images/location.svg') }}" alt="Адрес">
                    @lang('pages.contacts_main.address')
                </div>
                <div class="phone_group" style="margin-top: 30px;">
                    <a class="phone_number" href="@lang('pages.contacts_main.phone_href')">@lang('pages.contacts_main.phone')</a>
                    <p class="phone_desc">@lang('pages.contacts_main.phone_desc')</p>
                </div>
                <button class="free_call" style="margin-top: 30px;">
                    <img src="{{ asset('/images/phone.svg') }}" alt="@lang('pages.contacts_main.button_alt')" style="margin-right: 5px;">
                    @lang('pages.contacts_main.button')
                </button>
                <div class="socials_group" style="margin-top: 30px;">
                    <div class="socials_text">@lang('pages.contacts_main.social')</div>
                    <div class="socials">
                        <div class="social_box vk_box">
                            <img src="{{ asset('/images/vk.svg') }}" alt="@lang('pages.contacts_main.vk')">
                        </div>
                        <div class="social_box telegram_box">
                            <img src="{{ asset('/images/telegram.svg') }}" alt="@lang('pages.contacts_main.telegram')">
                        </div>
                        <div class="social_box whatsapp_box">
                            <img src="{{ asset('/images/whatsapp.svg') }}" alt="@lang('pages.contacts_main.whatsup')">
                        </div>
                        <div class="social_box viber_box">
                            <img src="{{ asset('/images/viber.svg') }}" alt="@lang('pages.contacts_main.viber')">
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad32682fb2ecf10b964866198faeb1f2ff8883488ef7eda2b3a84ac1541dfc4c6&amp;width=770&amp;height=363&amp;lang=ru_RU&amp;scroll=true"></script>        </div>
    </div>
</section>
