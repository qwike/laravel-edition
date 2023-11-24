<div id="modal_backdrop" style="display: none;">
    <div class="modal_content">
        <div class="modal_header">
            <div id="modal_title"></div>
            <div class="modal_close">✖</div>
        </div>
        <div class="modal_body">
            <div class="form_description">В ближайшее время мы позвоним вам и подробно расскажем об условиях и стоимости выбранного вами вида отдыха</div>
            <form action="{{ route('createOrder') }}" id="modalForm" method="POST">
                @csrf
                <div class="modal_price">
                    <span class="price_title">Стоимоть:</span> <span id="form_position_price"></span>
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_name">Имя</label>
                    <input type="text" id="input_name" name="name" class="modal_input" required minlength="4" maxlength="255" placeholder="Иван" />
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_phone">Номер телефона</label>
                    <input type="text" id="input_phone" class="modal_input" required placeholder="+7 (900) 900 90 90" />
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_comment">Комментарий</label>
                    <textarea id="input_comment" name="comment" rows="5" maxlength="3000" placeholder="Ваши пожелания, предпочтения или другая уточняющая информация"></textarea>
                </div>
                <input type="hidden" name="orderable_type" id="form_orderable_type" />
                <input type="hidden" name="orderable_id" id="form_orderable_id" />
                <div style="display: flex; justify-content: center; margin: 15px 0px">
                    {!! Captcha::display() !!}
                </div>
                <button class="modal_confirm">Отправить заявку</button>
            </form>
        </div>
        <div id="form_result" style="display: none;"></div>
    </div>
</div>
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script>
    $('#modal_title').html(positionName);
    $('#form_position_price').html(positionPrice);
    $('#form_orderable_type').val(orderableType);
    $('#form_orderable_id').val(orderableId);
    $('#modal_backdrop').fadeIn();
    $('#input_phone').mask('+7 (000) 000 00 00');
</script>
<script src="{{ asset('/js/modalForm.js') }}"></script>
