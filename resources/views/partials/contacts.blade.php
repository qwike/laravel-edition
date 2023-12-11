<section>
    <div class="container wow animate__animated animate__fadeIn">
        <div class="contacts_container">
            <div>
                <div class="section_title">@lang('pages.contacts_part.title')</div>
                <div class="contacts_info">
                    <div class="contacts_address">
                        <img src="{{ asset('/images/location.svg') }}" alt="Адрес">
                        @lang('pages.contacts_part.address')
                    </div>
                    <div class="phone_group" style="margin-top: 30px;">
                        <a class="phone_number" href="tel:@lang('pages.phone_number_compressed')">@lang('pages.phone_number')</a>
                        <p class="phone_desc">@lang('pages.contacts_part.phone_description')</p>
                    </div>
                    <button class="free_call" style="margin-top: 30px;" onclick="window.location='tel:@lang('pages.phone_number_compressed')'">
                        <img src="{{ asset('/images/phone.svg') }}" alt="@lang('pages.contacts_part.button')" style="margin-right: 5px;">
                        @lang('pages.contacts_part.button')
                    </button>
                    <div class="socials_group" style="margin-top: 30px;">
                        <div class="socials_text">@lang('pages.contacts_part.socials')</div>
                        <div class="socials">
                            <a href="https://vk.com/weekendvmywer" target="_blank">
                                <div class="social_box vk_box">
                                    <img src="{{ asset('/images/vk.svg') }}" alt="@lang('pages.contacts_part.vk')">
                                </div>
                            </a>
                            <a href="https://t.me/mariaprokofeva" target="_blank">
                                <div class="social_box telegram_box">
                                    <img src="{{ asset('/images/telegram.svg') }}" alt="@lang('pages.contacts_part.telegram')">
                                </div>
                            </a>
                            <a href="https://wa.me/+79018658755" target="_blank">
                                <div class="social_box whatsapp_box">
                                    <img src="{{ asset('/images/whatsapp.svg') }}" alt="@lang('pages.contacts_part.whatsup')">
                                </div>
                            </a>
                            <a href="viber://chat?number=%2B79018658755" target="_blank">
                                <div class="social_box viber_box">
                                    <img src="{{ asset('/images/viber.svg') }}" alt="@lang('pages.contacts_part.viber')">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contacts_map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad32682fb2ecf10b964866198faeb1f2ff8883488ef7eda2b3a84ac1541dfc4c6&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
    </div>
</section>
