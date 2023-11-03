<footer>
    <div class="container">
        <div class="footer_left">
            <div class="footer_list">
                <ul>
                    <li><a href="{{ route('excursions') }}" class="hover footer_link">Экскурсии</a></li>
                    <li><a href="{{ route('events') }}" class="hover footer_link">Мероприятия</a></li>
                    <li><a href="{{ route('houses') }}" class="hover footer_link">Гостевые домики</a></li>
                    <li><a href="{{ route('entertainments') }}" class="hover footer_link">Развлечения</a></li>
                </ul>
                <ul>
                    <li><a href="{{ route('products') }}" class="hover footer_link">Продукция</a></li>
                    <li><a href="{{ route('projects') }}" class="hover footer_link">Инвесторам</a></li>
                    <li><a href="{{ route('history') }}" class="hover footer_link">История</a></li>
                    <li><a href="{{ route('contacts') }}" class="hover footer_link">Контакты</a></li>
                </ul>
            </div>
        </div>
        <div class="footer_container">
            <div class="footer_logo">
                <a href="{{ route('home') }}" class="footer_logo_img"><img src="{{ asset('/images/logo.png') }}" alt="Логотип"></a>
                <div class="icons">
                    <a href="https://instagram.com/muvyr.village?utm_medium=copy_link"><img src="{{ asset('/images/inst.svg') }}" alt="Инстаграм"></a>
                    <a href="https://vk.com/weekendvmywer"><img src="{{ asset('/images/vk.svg') }}" alt="ВК"></a>
                    <a href="https://t.me/discoverUdmurtia"><img src="{{ asset('/images/telegram.svg') }}" alt="Телеграм"></a>
                </div>
            </div>
            <div class="footer_right">
                <a href="tel:+79018658755" class="hover footer_link">+7 (901) 865 87-55</a>
                <p>Сделано командой</p>
                <p>"Будущее России"</p>
            </div>
        </div>

    </div>
</footer>
