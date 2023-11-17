<header>
    <div class="container">
        <div class="header_top">
            <a class="logo_group" href="{{ route('home') }}">
                <img src="{{ asset('/images/logo.png') }}" alt="Мувыр" class="logo_img">
                <div class="logo_text">Открываем Мувыр</div>
            </a>
            <div class="socials_group">
                <div class="socials_text">Наши страницы в соц. сетях</div>
                <div class="socials">
                    <div class="social_box vk_box">
                        <img src="{{ asset('/images/vk.svg') }}" alt="Группа вконтакте">
                    </div>
                    <div class="social_box telegram_box">
                        <img src="{{ asset('/images/telegram.svg') }}" alt="Телеграм">
                    </div>
                    <div class="social_box whatsapp_box">
                        <img src="{{ asset('/images/whatsapp.svg') }}" alt="Ватсапп">
                    </div>
                    <div class="social_box viber_box">
                        <img src="{{ asset('/images/viber.svg') }}" alt="Вайбер">
                    </div>
                </div>
            </div>
            <button class="free_call">
                <img src="{{ asset('/images/phone.svg') }}" alt="Бесплатный звонок" style="margin-right: 5px;">
                Бесплатный звонок
            </button>
            <div class="phone_group">
                <a class="phone_number" href="tel:+79018658755">+7 (901) 865-87-55</a>
                <p class="phone_desc">Ежедневно с 9:00 до 20:00</p>
            </div>
        </div>
    </div>
    <div class="container header_menu">
        <div class="header_menu_buttons">
            <a href="{{ route('home') }}" class="header_button home_button">Главная</a>
            <a href="{{ route('history') }}" class="header_button history_button">История</a>
            <a href="{{ route('excursions') }}" class="header_button excursions_button">Экскурсии</a>
            <a href="{{ route('cafe') }}" class="header_button cafe_button">Кафе</a>
            <a href="{{ route('events') }}" class="header_button events_button">Мероприятия</a>
            <a href="{{ route('houses') }}" class="header_button houses_button">Домики и беседки</a>
            <a href="{{ route('entertainments') }}" class="header_button entertainments_button">Развлечения</a>
            <a href="{{ route('products') }}" class="header_button products_button">Продукция</a>
            <a href="{{ route('projects') }}" class="header_button projects_button">Инвесторам</a>
            <a href="{{ route('contacts') }}" class="header_button contacts_button">Контакты</a>
        </div>
    </div>
</header>
<script src="{{ asset('/js/header.js') }}"></script>
