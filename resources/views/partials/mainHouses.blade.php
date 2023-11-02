<div class="container mt">
    <div class="wow animate__animated animate__fadeIn">
        <div class="header">Гостевые Домики</div>
        <div class="text">
            <p>Мы предлагаем вам остановиться в наших</p>
            <p>уютных гостевых домиках</p>
        </div>
    </div>
    <div class="houses">
        @if($houses->isEmpty())
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
