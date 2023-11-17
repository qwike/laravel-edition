@extends('layout.app')

@section('title', 'Мероприятия')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/cafe.css') }}">
@endsection

@section('content')
    <div class="page_header">
        <div class="container">
            <div class="page_header_title">Кафе</div>
            <div class="page_header_text">В нашем уютном кафе вы можете провести любой праздник. Наша команда профессионалов позаботиться об организации и устроит все так, что у вас не будет времени заскучать</div>
            <div class="page_header_buttons">
                <a href="#events_catalog" class="page_header_excursions_button">Посмотреть все</a>
            </div>
        </div>
    </div>
    <section id="events_catalog">
        <div class="container">
            <div class="catalog">
                <div class="card">
                    <div class="card_img_box">
                        <img src="{{ asset('/images/marry.jpg') }}" alt="">
                    </div>
                    <div class="card_info">
                        <div class="card_title">Организация свадеб</div>
                        <div class="card_description">Создание волшебства в самый важный день вашей жизни — наша страсть и специализация. Мы в Деревне Мувыр с радостью воплотим ваши мечты о идеальной свадьбе в живописных локациях, предоставив заботливую организационную поддержку и уникальные идеи для создания незабываемых моментов</div>
                        <div class="card_line">
                            <div class="card_price">От 15 000₽</div>
                            <button class="card_button orderable">
                                Оставить заявку
                                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card_img_box">
                        <img src="{{ asset('/images/ubiley.jpg') }}" alt="">
                    </div>
                    <div class="card_info">
                        <div class="card_title">Организация юбилеев</div>
                        <div class="card_description">В Деревне Мувыр каждый юбилей становится уникальным праздником, наполненным волшебством и радостью. Наша команда профессионалов по организации мероприятий гарантирует, что ваш особенный день будет запоминающимся. Мы тщательно прорабатываем каждую деталь, создавая атмосферу, которая отражает вашу индивидуальность и подчеркивает важность этого события</div>
                        <div class="card_line">
                            <div class="card_price">От 10 000₽</div>
                            <button class="card_button orderable">
                                Оставить заявку
                                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card_img_box">
                        <img src="{{ asset('/images/korporativ.jpg') }}" alt="">
                    </div>
                    <div class="card_info">
                        <div class="card_title">Проведение корпоративов</div>
                        <div class="card_description">В Деревне Мувыр мы понимаем, что успешный корпоратив - это не только деловая встреча, но и отличная возможность для команды отдохнуть и укрепить взаимоотношения. Наша команда профессионалов заботится о каждой детали вашего мероприятия, создавая атмосферу, способствующую эффективному общению и приятному времяпрепровождению</div>
                        <div class="card_line">
                            <div class="card_price">От 13 000₽</div>
                            <button class="card_button orderable">
                                Оставить заявку
                                <img src="{{ asset('/images/arrow.svg') }}" alt="стрелка">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.formModal')
    <script>
        $(document).ready(() => {
            $('.cafe_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
