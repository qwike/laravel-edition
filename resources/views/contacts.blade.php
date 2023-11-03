@extends('layout.app')

@section('title', 'Контакты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/contacts.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <h2>Контакты</h2>
        <div class="information_block" style="margin-top: 25px;">
            Если ты любишь активный, интересный отдых в живописных местах, при этом тебе нравится узнавать что-то новое и полезное для себя, если ты сторонник семейного отдыха, то тебе обязательно нужно приехать в деревню Мувыр, Игринского района.
        </div>
        <div class="information_block" style="margin-top: 25px;">В нашей деревне тебя ждут кафе, катание на лодках, сапах, рыбалка, висячий мост, лестничный спуск к реке Лоза, троллей 30 м., веревочный парк, детский городок, спортивная площадка с резиновым покрытием, животные фермы, вкусная молочная продукция.
            А самое главное, чем богата наша деревня - это история одного человека и этим человеком можешь стать ТЫ!</div>
        <div class="information_block" style="margin-top: 25px;"><span>Режим работы:</span>
            <div class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.1s">
                <br><span>Кафе</span> с 10.00-19.00 пт., сб., вс.
                <br>Будни по предзаказу</div>
        </div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" style="margin-top: 25px;"><span>Лодочная станция</span> с 9.00 до 21.00 в будни и выходные</div>
        <div class="information_block" style="margin-top: 25px;">Приехать в деревню можно в любое время, вход свободный (территория пруда, животные фермы, троллей, батуты, электромобили, прокат лодок, велосипеды платные)</div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.3s" style="margin-top: 25px;"><span>Адрес:</span><br> Игринский район, д. Мувыр</div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.4s" style="margin-top: 25px;"><span>Телефон:</span><br><a href="tel:+79018658755">+7 (901) 865 87-55</a></div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s" style="margin-top: 25px;"><span>Вконтакте:</span><br><a href="https://vk.com/weekendvmywer">https://vk.com/weekendvmywer</a></div>

        <h3 style="margin-top: 50px;">Интерактивная карта Мувыра</h3>
        <div class="map">
            <div class="wow animate__animated animate__zoomIn" style="margin-top: 50px;" id="rec590986084" class="r t-rec" style=" " data-animationappear="off" data-record-type="396"><!-- T396 --><style>#rec590986084 .t396__artboard {height: 900px; background-color: #ffffff; }#rec590986084 .t396__filter {height: 900px; }#rec590986084 .t396__carrier{height: 900px;background-position: center center;background-attachment: scroll;background-size: cover;background-repeat: no-repeat;}@media screen and (max-width: 1199px) {#rec590986084 .t396__artboard {}#rec590986084 .t396__filter {}#rec590986084 .t396__carrier {background-attachment: scroll;}}@media screen and (max-width: 959px) {#rec590986084 .t396__artboard {}#rec590986084 .t396__filter {}#rec590986084 .t396__carrier {background-attachment: scroll;}}@media screen and (max-width: 639px) {#rec590986084 .t396__artboard {}#rec590986084 .t396__filter {}#rec590986084 .t396__carrier {background-attachment: scroll;}}@media screen and (max-width: 479px) {#rec590986084 .t396__artboard {}#rec590986084 .t396__filter {}#rec590986084 .t396__carrier {background-attachment: scroll;}} #rec590986084 .tn-elem[data-elem-id="1684089518676"] { z-index: 1; top: 0px;left: calc(50% - 600px + 0px);width: 100%;height:700px;}#rec590986084 .tn-elem[data-elem-id="1684089518676"] .tn-atom { background-position: center center;border-color: transparent ;border-style: solid ; }@media screen and (max-width: 1199px) {}@media screen and (max-width: 959px) {#rec590986084 .tn-elem[data-elem-id="1684089518676"] {height: 500px;}}@media screen and (max-width: 639px) {}@media screen and (max-width: 479px) {}</style><div class="t396"><div class="t396__artboard rendered" data-artboard-recid="590986084" data-artboard-screens="320,480,640,960,1200" data-artboard-height="900" data-artboard-valign="center" data-artboard-upscale="grid" data-artboard-proxy-min-offset-top="0" data-artboard-proxy-min-height="900" data-artboard-proxy-max-height="900"><div class="t396__carrier" data-artboard-recid="590986084"></div><div class="t396__filter" data-artboard-recid="590986084"></div><div class="t396__elem tn-elem tn-elem__5909860841684089518676" data-elem-id="1684089518676" data-elem-type="html" data-field-top-value="0" data-field-left-value="0" data-field-height-value="700" data-field-width-value="100" data-field-axisy-value="top" data-field-axisx-value="left" data-field-container-value="grid" data-field-topunits-value="px" data-field-leftunits-value="px" data-field-heightunits-value="px" data-field-widthunits-value="%" data-field-height-res-640-value="500" data-fields="width,height,top,left,container,axisx,axisy,widthunits,heightunits,leftunits,topunits" style="width: 100%; left: 245px; top: 0px; height: 700px;"><div class="tn-atom tn-atom__html"><iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3A8147f15297641ff642dd3e277c4e33202b14dfdeccc02e1cf1de0b9ce9857ed7" frameborder="0" allowfullscreen="true" width="100%" height="100%" style="display: block;"></iframe></div></div> </div> </div> <script>t_onReady(function () {
                        t_onFuncLoad('t396_init', function () {
                            t396_init('590986084');
                        });
                    });</script><!-- /T396 --></div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
