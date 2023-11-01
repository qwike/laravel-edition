<header id="desktop">
    <div class="container">
        <nav>
            <div>
                <div class="drop_container">
                    <div class="drop_btn hover"><img src="/storage/images/drop.svg" alt="Список" style="margin-right: 20px">Услуги</div>
                    <div class="drop">
                        <a href="tours.php" class="hover" id="tours">Экскурсии</a>
                        <a href="events.php" class="hover" id="events">Мероприятия</a>
                        <a href="houses.php" class="hover" id="houses">Гостевые домики</a>
                        <a href="funs.php" class="hover" id="funs">Развлечения</a>
                        <a href="milk.php" class="hover" id="milk">Молочная продукция</a>
                        <a href="investors.php" class="hover" id="investors">Инвесторам</a>
                    </div>
                </div>
                <a href="history.php" class="hover" id="history">История</a>
            </div>
            <div class="header_logo">
                <a href="{{ route('home') }}"><img src="/storage/images/logo.png" alt="Логотип"></a>
            </div>
            <div>
                <div class="icons">
                    <a href="https://instagram.com/muvyr.village?utm_medium=copy_link"><img src="/storage/images/inst.svg" alt="Инстаграм"></a>
                    <a href="https://vk.com/weekendvmywer"><img src="/storage/images/vk.svg" alt="ВК"></a>
                    <a href="https://t.me/discoverUdmurtia"><img src="/storage/images/telegram.svg" alt="Телеграм"></a>
                </div>
                <a href="tel:" class="hover">+7 (901) 865 87-55</a>
            </div>
        </nav>
    </div>
</header>
<header id="mobile">
    <div class="container mobile_box">
        <div class="icons">
            <a href="https://instagram.com/muvyr.village?utm_medium=copy_link"><img src="/storage/images/inst.svg" alt="Инстаграм"></a>
            <a href="https://vk.com/weekendvmywer"><img src="/storage/images/vk.svg" alt="ВК"></a>
            <a href="https://t.me/discoverUdmurtia"><img src="/storage/images/telegram.svg" alt="Телеграм"></a>
        </div>
        <div class="header_logo">
            <a href="{{ route('home') }}"><img src="/storage/images/logo.png" alt="Логотип"></a>
        </div>
        <div style="position: relative;">
            <div class="header_burger">
                <img src="/storage/images/burger.svg" alt="Бургер">
            </div>
            <div class="header_burger_menu">
                <a href="tours.php" class="hover" id="tours">Экскурсии</a>
                <a href="events.php" class="hover" id="events">Мероприятия</a>
                <a href="houses.php" class="hover" id="houses">Гостевые домики</a>
                <a href="funs.php" class="hover" id="funs">Развлечения</a>
                <a href="milk.php" class="hover" id="milk">Молочная продукция</a>
                <a href="history.php" class="hover" id="history">История</a>
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
            $(".drop_btn img").attr("src", "/storage/images/drop.svg");
            $(".drop").css({
                "max-height": "0px",
                "padding-top": "0px",
            });
            i = false;
        }
        else {
            $(this).addClass("drop_btn_active");
            $(".drop_btn img").attr("src", "/storage/images/undrop.svg");
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
            $(this).find("img").attr("src", "/storage/images/burger.svg");
            $(".header_burger_menu").css({
                "max-height": "0px",
                "padding-top": "0px",
            });
            clicked = false;
        }
        else {
            $(this).find("img").attr("src", "/storage/images/close.svg");
            $(".header_burger_menu").css({
                "max-height": "600px",
                "padding-top": "40px",
            });
            clicked = true;
        }
    });
</script>
</script>
