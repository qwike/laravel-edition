@extends('layout.app')

@section('title', 'Возрожденный Мувыр')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">
@endsection

@section('content')
    <section class="welcome">
        <div class="welcome_title wow animate__animated animate__fadeInUpBig">
            Добро пожаловать в
            <p><span>Мувыр</span></p>
            <a class="learn_more" href="#УЗНАТЬ_БОЛЬШЕ_О_МУВЫРЕ">Узнать больше</a>
        </div>
    </section>
    <main>
        <div class="container mt">
            <div class="flex_space_between">
                <div class="text_box wow animate__animated animate__fadeIn" id="УЗНАТЬ_БОЛЬШЕ_О_МУВЫРЕ">
                    <div class="header">Экотуризм в Мувыре</div>
                    <div class="text">В деревне Мувыр можно наслаждаться природой, прогуляться по лесу до висячего моста, прокатиться на лодке, рыбачить, организовать барбекю, устроить пикник в беседке или под открытым небом и многое другое</div>
                </div>
                <div class="tours_slider_box wow animate__animated animate__fadeInRight">
                    <div id="tour_prev_arrow" class="arrow"><</div>
                    <div class="track_box">
                        <div class="tours" id="tour_slider">
                            @if(empty($excursions))
                                <div>В данный момент нет экскурсий :(</div>
                            @else
                                @foreach($excursions as $excursion)
                                    <div class="tour">
                                        <div class="box"><img src="{{ $excursion->getExcursionImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Экскурсия"></div>
                                        <div class="tour_header">{{ $excursion->name }}</div>
                                        <div class="tour_text">{{ substr($excursion->description, 0, 58) . "..." }}</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div id="tour_next_arrow" class="arrow">></div>
                </div>
            </div>
            <div style="float: right; margin-top: 15px">
                <a href="tours.php" class="page_link">Все Экскурсии</a>
            </div>
        </div>
        <div class="container mt">
            <div class="wow animate__animated animate__fadeIn">
                <div class="header">Мероприятия</div>
                <div class="text">Мы предлагаем множество чудесных мероприятий</div>
            </div>
            <div class="event_slider_box">
                <div id="event_prev_arrow" class="arrow"><</div>
                <div class="event_track_box">
                    <div class="events" id="event_slider">
                        @if(empty($events))
                            <div>В данный момент нет мероприятий :(</div>
                        @else
                            @foreach($events as $event)
                                <div class="event wow animate__animated animate__fadeInUp">
                                    <div class="box"><img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Мероприятие"></div>
                                    <div class="tour_header">{{ $event->name }}</div>
                                    <div class="tour_text">{{ substr($event->description, 0, 60)."..." }}</div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div id="event_next_arrow" class="arrow">></div>
            </div>
            <div style="float: right; margin-top: 15px">
                <a href="events.php" class="page_link">Все Мероприятия</a>
            </div>
        </div>
        <div class="container mt">
            <div class="flex_space_between">
                <div class="wow animate__animated animate__fadeIn">
                    <div class="header">Организация Свадеб</div>
                    <div class="text">Мы предлагаем уникальную возможность создать незабываемое свадебное торжество в живописной деревне Мувыр. Наша команда профессионалов занимается всеми аспектами организации свадебного мероприятия, начиная от выбора идеального места для проведения церемонии и банкета до оформления и развлекательной программы</div>
                    <div style="margin-top: 20px">
                        <a href="events.php" class="page_link">Все Мероприятия</a>
                    </div>
                </div>
                <img src="{{ asset('/images/marry.jpg') }}" alt="Свадьбы" class="marry_img wow animate__animated animate__zoomIn">
            </div>
        </div>
        <div class="container mt">
            <div class="wow animate__animated animate__fadeIn">
                <div class="header">Развлечения</div>
                <div class="text">Мы предлагаем большой спектр развлечений</div>
            </div>
            <div class="flex_space_between" style="margin-top: 20px;">
                <div class="fun_main_img_container wow animate__animated animate__slideInUp">
                    <img src="{{ asset('/images/fun1.jpg') }}" alt="Развлечение" class="fun_main_img">
                </div>
                <div class="fun_images">
                    <div class="fun_img_container wow animate__animated animate__slideInUp" data-wow-delay="0.3s">
                        <img src="{{ asset('/images/fun2.jpg') }}" alt="Развлечение" class="fun_img">
                    </div>
                    <div class="fun_img_container wow animate__animated animate__slideInUp" data-wow-delay="0.45s">
                        <img src="{{ asset('/images/fun3.jpg') }}" alt="Развлечение" class="fun_img">
                    </div>
                </div>
            </div>
            <div style="float: right; margin-top: 15px">
                <a href="funs.php" class="page_link">Развлечения</a>
            </div>
        </div>
        <div class="container mt">
            <div class="wow animate__animated animate__fadeIn">
                <div class="header">Гостевые Домики</div>
                <div class="text">
                    <p>Мы предлагаем вам остановиться в наших</p>
                    <p>уютных гостевых домиках</p>
                </div>
            </div>
            <div class="houses">
                @if(empty($houses))
                    <div>В данный момент нет домиков :(</div>
                @else
                    @foreach($houses as $house)
                        <div class="house wow animate__animated animate__fadeInLeft">
                            <div class="house_img_container">
                                <img src="{{ $house->getHouseImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Домик">
                            </div>
                            <div class="house_title">{{ $house->name }}</div>
                            <div class="house_desc">{{ $house->description }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div style="float: right; margin-top: 15px">
                <a href="houses.php" class="page_link">Бронировать</a>
            </div>
        </div>
        <div class="container mt">
            <div class="flex_space_between">
                <div class="milk_text wow animate__animated animate__fadeIn">
                    <div class="header">Молочная Продукция</div>
                    <div class="text">Молочная продукция, производящаяся в деревне Мувыр представляет широкий ассортимент свежих и натуральных молочных продуктов, созданных с любовью и заботой в нашей деревне. Мы гордимся высоким качеством нашей продукции, которая производится из свежего молока, полученного от местных коров. Наша команда экспертов следит за каждым этапом производства, чтобы обеспечить вам самые вкусные и полезные молочные продукты. От свежего молока до йогуртов, сыров и масла - мы предлагаем вам насладиться натуральными и питательными продуктами от нашей деревни Мувыр.</div>
                    <div style="float: left; margin-top: 30px">
                        <a href="milk.php" class="page_link">Молочая продукция</a>
                    </div>
                </div>
                <div class="milk_img_container wow animate__animated animate__zoomIn">
                    <img src="{{ asset('/images/milk.jpg') }}" alt="Молочная продукция" class="milk_img">
                </div>
            </div>
        </div>
        <div class="container mt">
            <div class="goals_title">Инвесторам</div>
            <div class="goals">
                @if(empty($projects))
                    <div>В данный момент здесь пусто :(</div>
                @else
                    @foreach($projects as $project)
                        <div class="goal wow animate__animated animate__backInUp">
                            <div class="goal_img_container">
                                <img src="{{ $project->getProjectImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото проекта">
                            </div>
                            <div class="goal_text">
                                <div class="goal_header">{{ $project->name }}</div>
                                <div class="text">{{ $project->description }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="investors">Инвестируя в возрожденную деревню Мувыр, вы не только получите выгоду и прибыль, но и внесете значимый вклад в развитие этого прекрасного места. Мы гарантируем прозрачность, надежность и сотрудничество на взаимовыгодных условиях. </div>
        </div>
        <div class="container" style="margin-block: 30px;">
            <div class="flex_space_between">
                <div class="his_img_box">
                    <img src="{{ asset('/images/his.png') }}" alt="История">
                </div>
                <div class="his_text wow animate__animated animate__fadeIn">
                    <div class="header">История Мувыра</div>
                    <div class="text">В начале 1980-х родную деревню Корепанова, основанную в 1837-м, стёрли с лица земли. Дома снесли бульдозером, людей перебросили в соседние сёла. «Неперспективный» Мувыр перестал существовать в документах и на картах. А Александр никак не мог понять: зачем и кому это нужно? Он сидел на берегу реки, смотрел на поле, где ещё недавно кипела жизнь, и у него, молодого сильного мужчины, отслужившего срочную на границе с Китаем, опускались руки. Именно тогда он пообещал себе возродить малую родину.</div>
                    <div style="margin-top: 20px">
                        <a href="history.php" class="page_link">Читать дальше</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="flex_space_between">
                <div class="wow animate__animated animate__fadeIn">
                    <div class="header">Контакты</div>
                    <div class="text">Деревня Мувыр расположена в Игринском районе Удмуртии, в двух часах езды от столицы региона — Ижевска.
                        <br>Адрес:
                        Игринский район, д. Мувыр
                        <br>Телефон:
                        +7 (901) 865-87-55
                        <br>Вконтакте:
                        https://vk.com/weekendvmywer
                    </div>
                    <div style="margin-block: 20px">
                        <a href="contacts.php" class="page_link">Карта Мувыра</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('/js/slick.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#tour_slider").slick({
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: "#tour_prev_arrow",
                nextArrow: "#tour_next_arrow",
            });
            $("#event_slider").slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                prevArrow: "#event_prev_arrow",
                nextArrow: "#event_next_arrow",
                responsive: [
                    {
                        breakpoint: 950,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                ],
            });
        });
    </script>
    <script>
        new WOW().init();
    </script>
@endsection
