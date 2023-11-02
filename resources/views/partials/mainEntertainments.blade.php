<div class="container mt">
    <div class="wow animate__animated animate__fadeIn">
        <div class="header">Развлечения</div>
        <div class="text">Мы предлагаем большой спектр развлечений</div>
    </div>
    <div class="flex_space_between" style="margin-top: 20px;">
        <div class="fun_main_img_container wow animate__animated animate__slideInUp">
            <img src="{{ $entertainments->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Развлечение" class="fun_main_img">
        </div>
        <div class="fun_images">
            <div class="fun_img_container wow animate__animated animate__slideInUp" data-wow-delay="0.3s">
                <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Развлечение" class="fun_img">
            </div>
            <div class="fun_img_container wow animate__animated animate__slideInUp" data-wow-delay="0.45s">
                <img src="{{ $event->getEventImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Развлечение" class="fun_img">
            </div>
        </div>
    </div>
    <div style="float: right; margin-top: 15px">
        <a href="funs.php" class="page_link">Развлечения</a>
    </div>
</div>
