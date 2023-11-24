$(document).ready(() => {
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
        formData.append('g-recaptcha-response', $('textarea[name="g-recaptcha-response"]').val());

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                $('.modal_body').fadeOut();
                $('#form_result').html('<div class="thanks"><p><img src="../images/success.svg" alt="успех"></p><p>Спасибо за заявку</p><p>Мы перезвоним в ближайшее время</p></div>').css('color', 'black').fadeIn();
            },
            error: function(response) {
                console.log(response);
                $('#form_result').html(response.responseJSON.message).css('color', 'red').fadeIn();
            }
        });
    });
});
