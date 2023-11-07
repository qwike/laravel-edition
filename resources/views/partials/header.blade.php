<header id="desktop">
    <div class="container">
        <nav>
            <div>
                <div class="drop_container">
                    <div class="drop_btn hover"><img src="{{ asset('/images/drop.svg') }}" alt="Список" style="margin-right: 20px">@lang('pages.layout.services')</div>
                    <div class="drop">
                        <a href="{{ route('excursions') }}" class="hover b_excursions" id="excursions">@lang('pages.layout.excursions')</a>
                        <a href="{{ route('events') }}" class="hover b_events" id="events">@lang('pages.layout.events')</a>
                        <a href="{{ route('houses') }}" class="hover b_houses" id="houses">@lang('pages.layout.houses')</a>
                        <a href="{{ route('entertainments') }}" class="hover b_entertainments" id="entertainments">@lang('pages.layout.entertainments')</a>
                        <a href="{{ route('products') }}" class="hover b_products" id="products">@lang('pages.layout.products')</a>
                        <a href="{{ route('contacts') }}" class="hover b_contacts" id="contacts">@lang('pages.layout.contacts')</a>
                        <a href="{{ route('projects') }}" class="hover b_projects" id="projects">@lang('pages.layout.projects')</a>
                    </div>
                </div>
                <a href="{{ route('history') }}" class="hover b_history" id="history">@lang('pages.layout.history')</a>
            </div>
            <div class="header_logo">
                <a href="{{ route('home') }}"><img src="{{ asset('/images/logo.png') }}" alt="Логотип"></a>
            </div>
            <div>
                <div class="icons">
                    <a href="https://instagram.com/muvyr.village?utm_medium=copy_link"><img src="{{ asset('/images/inst.svg') }}" alt="Инстаграм"></a>
                    <a href="https://vk.com/weekendvmywer"><img src="{{ asset('/images/vk.svg') }}" alt="ВК"></a>
                    <a href="https://t.me/discoverUdmurtia"><img src="{{ asset('/images/telegram.svg') }}" alt="Телеграм"></a>
                </div>
                <a href="tel:" class="hover">@lang('pages.phone_number')</a>
            </div>
        </nav>
    </div>
</header>
<header id="mobile">
    <div class="container mobile_box">
        <div class="icons">
            <a href="https://instagram.com/muvyr.village?utm_medium=copy_link"><img src="{{ asset('/images/inst.svg') }}" alt="Инстаграм"></a>
            <a href="https://vk.com/weekendvmywer"><img src="{{ asset('/images/vk.svg') }}" alt="ВК"></a>
            <a href="https://t.me/discoverUdmurtia"><img src="{{ asset('/images/telegram.svg') }}" alt="Телеграм"></a>
        </div>
        <div class="header_logo">
            <a href="{{ route('home') }}"><img src="{{ asset('/images/logo.png') }}" alt="Логотип"></a>
        </div>
        <div style="position: relative;">
            <div class="header_burger">
                <img src="{{ asset('/images/burger.svg') }}" alt="Бургер">
            </div>
            <div class="header_burger_menu">
                <a href="{{ route('excursions') }}" class="hover b_excursions" id="excursions">@lang('pages.layout.excursions')</a>
                <a href="{{ route('events') }}" class="hover b_events" id="events">@lang('pages.layout.events')</a>
                <a href="{{ route('houses') }}" class="hover b_houses" id="houses">@lang('pages.layout.houses')</a>
                <a href="{{ route('entertainments') }}" class="hover b_entertainments" id="entertainments">@lang('pages.layout.entertainments')</a>
                <a href="{{ route('products') }}" class="hover b_products" id="products">@lang('pages.layout.products')</a>
                <a href="{{ route('history') }}" class="hover b_history" id="history">@lang('pages.layout.history')</a>
                <a href="{{ route('contacts') }}" class="hover b_contacts" id="contacts">@lang('pages.layout.contacts')</a>
                <a href="{{ route('projects') }}" class="hover b_projects" id="projects">@lang('pages.layout.projects')</a>
            </div>
        </div>
    </div>
</header>
<script>
    var prevScrollpos = $(window).scrollTop();
    let i = false;
    $(".drop_btn").click(function() {
        if(i) {
            $(this).removeClass("drop_btn_active");
            $(".drop_btn img").attr("src", "{{ asset('/images/drop.svg') }}");
            $(".drop").css({
                "max-height": "0px",
                "padding-top": "0px",
            });
            i = false;
        }
        else {
            $(this).addClass("drop_btn_active");
            $(".drop_btn img").attr("src", "{{ asset('/images/undrop.svg') }}");
            $(".drop").css({
                "max-height": "600px",
                "padding-top": "40px",
            });
            i = true;
        }

    });
    $(window).scroll(function() {
        var currentScrollPos = $(window).scrollTop();
        if (prevScrollpos > currentScrollPos) {
            $("#mobile").css("top", "0px");
        } else {
            $("#mobile").css("top", "-1000px");
        }
        prevScrollpos = currentScrollPos;
    });
    let clicked = false;
    $(".header_burger").click(function() {
        if(clicked) {
            $(this).find("img").attr("src", "{{ asset('/images/burger.svg') }}");
            $(".header_burger_menu").css({
                "max-height": "0px",
                "padding-top": "0px",
            });
            clicked = false;
        }
        else {
            $(this).find("img").attr("src", "{{ asset('/images/close.svg') }}");
            $(".header_burger_menu").css({
                "max-height": "600px",
                "padding-top": "40px",
            });
            clicked = true;
        }
    });
</script>
