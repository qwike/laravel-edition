$(document).ready(() => {
    $(".item_btn").click(function(e){
        e.preventDefault();

        $('#modal_title').html($(this).data('position-name'));
        $('#form_position_price').html($(this).data('position-price'));
        $('#modal_backdrop').fadeIn();
    });
    $('#modal_backdrop').click(function (e) {
        if(e.target.id === 'modal_backdrop') {
            $('#modal_backdrop').fadeOut();
        }
    });
    $('.modal_close').click(function () {
        $('#modal_backdrop').fadeOut();
    });
});
