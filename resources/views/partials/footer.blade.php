<footer>
    <div class="container">
        <div class="footer_left">
            <div class="footer_list">
                <ul>
                    <li><a href="tours.php" class="hover footer_link">Экскурсии</a></li>
                    <li><a href="events.php" class="hover footer_link">Мероприятия</a></li>
                    <li><a href="{{ route('houses') }}" class="hover footer_link">Гостевые домики</a></li>
                </ul>
                <ul>
                    <li><a href="funs.php" class="hover footer_link">Развлечения</a></li>
                    <li><a href="milk.php" class="hover footer_link">Продукция</a></li>
                    <li><a href="history.php" class="hover footer_link">История</a></li>
                </ul>
            </div>

        </div>
        <div class="footer_container">
            <div class="footer_logo">
                <a href="{{ route('home') }}" class="footer_logo_img"><img src="{{ asset('/images/logo.png') }}" alt="Логотип" class="footer_logo_img"></a>
                <div class="icons">
                    <a href="https://instagram.com/muvyr.village?utm_medium=copy_link"><img src="{{ asset('/images/inst.svg') }}" alt="Инстаграм"></a>
                    <a href="https://vk.com/weekendvmywer"><img src="{{ asset('/images/vk.svg') }}" alt="ВК"></a>
                    <a href="https://t.me/discoverUdmurtia"><img src="{{ asset('/images/telegram.svg') }}" alt="Телеграм"></a>
                </div>
            </div>
            <div class="footer_right">
                <p class="footer_contacts"><a href="contacts.php" class="hover footer_link">Контакты</a><a href="tel:" class="hover footer_link">+7 (901) 865 87-55</a></p>
                <p>Сделано командой</p>
                <p>"Будущее России"</p>
            </div>
        </div>

    </div>
</footer>
