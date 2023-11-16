$(document).ready(() => {
    $(".orderable").click(function(e){
        e.preventDefault();

        $('#modal_title').html($(this).data('position-name'));
        $('#form_position_price').html($(this).data('position-price'));
        $('#form_orderable_type').val($(this).data('orderable-type'));
        $('#form_orderable_id').val($(this).data('orderable-id'));
        $('#modal_backdrop').fadeIn();
        $('.modal_body').fadeIn();
        $('#form_result').fadeOut();
    });
    $('#modal_backdrop').click(function (e) {
        if(e.target.id === 'modal_backdrop') {
            $('#modal_backdrop').fadeOut();
        }
    });
    $('.modal_close').click(function () {
        $('#modal_backdrop').fadeOut();
    });
    $('#modalForm').submit(function (e) {
        e.preventDefault();

        let phoneValue = $('#input_phone').val();
        phoneValue = phoneValue.replace(/[\s()]/g, '');

        const url = $(this).attr('action');
        const formData = new FormData(this);

        formData.append('phone', phoneValue);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                $('.modal_body').fadeOut();
                $('#form_result').html('Спасибо за заявку<br>Мы перезвоним в ближайшее время').css('color', 'black').fadeIn();
            },
            error: function(response) {
                console.log(response);
                $('#form_result').html(response.responseJSON.message).css('color', 'red').fadeIn();
            }
        });
    });
});
