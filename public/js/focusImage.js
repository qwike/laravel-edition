$('.slider_img').click(function () {
    $('#focusImg').css('opacity', '0.5');
    $('#focusImg').attr('src', $(this).attr('src'));
    setTimeout(function () {
        $('#focusImg').css('opacity', '1')
    }, 300);
});