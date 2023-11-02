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
