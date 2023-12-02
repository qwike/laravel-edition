$(document).ready(() => {
    var lastScrollTop = 0;
    var show = false;

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var header = $('.header_menu').first();
        var header_m = $('header .container').first();

        if ($(window).width() > 801) {
            if (scroll > 80) {
                header.addClass('sticky');
            }
            else {
                header.removeClass('sticky');
            }
        }
        else {
            if (scroll > lastScrollTop && header.find('.header_menu_buttons').css('display') === 'none'){
                header_m.css('top', '-160px');
            }
            else {
                header_m.css('top', '0');
            }
        }

        lastScrollTop = scroll;
    });

    $('.burger_box').click(function () {
        var burger = $(this).find('img');
        if (show) {
            $('header .header_menu_buttons').css({'display':'none', 'padding-top':'-100px'});
            burger.attr('src', $(this).data('open'));
            show = false;
        }
        else {
            $('header .header_menu_buttons').css({'display':'flex', 'padding-top':'15px'});
            burger.attr('src', $(this).data('close'));
            show = true;
        }
    });
});
