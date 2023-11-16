@extends('layout.app')

@section('title', 'Контакты')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/contacts.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <h2>@lang('pages.contacts.title')</h2>
        <div class="information_block" style="margin-top: 25px;">@lang('pages.contacts.description_block_1')</div>
        <div class="information_block" style="margin-top: 25px;">@lang('pages.contacts.description_block_2')</div>
        <div class="information_block" style="margin-top: 25px;">
            <span>@lang('pages.contacts.operation')</span>
        </div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.1s" style="margin-top: 25px;">
            <span>@lang('pages.contacts.cafe.label')</span> @lang('pages.contacts.cafe.value')
        </div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" style="margin-top: 25px;">
            <span>@lang('pages.contacts.boats.label')</span> @lang('pages.contacts.boats.value')
        </div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.3s" style="margin-top: 25px;">
            <span>@lang('pages.contacts.address_label')</span><br>@lang('pages.address')
        </div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.4s" style="margin-top: 25px;">
            <span>@lang('pages.contacts.phone_label')</span><br><a href="tel:+79018658755">@lang('pages.phone_number')</a>
        </div>
        <div class="information_block wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s" style="margin-top: 25px;">
            <span>@lang('pages.contacts.group_label')</span><br><a href="https://vk.com/weekendvmywer">@lang('pages.group')</a>
        </div>
        <h3 style="margin-top: 50px;">@lang('pages.contacts.map_title')</h3>
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
            $('.contacts_button').addClass('active_header_button');
            new WOW().init();
        })
    </script>
@endsection
