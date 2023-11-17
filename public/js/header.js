$(document).ready(() => {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var header = $('.header_menu').first();

        if (scroll > 80) {
            header.addClass('sticky');
        } else {
            header.removeClass('sticky');
        }
    });
});
