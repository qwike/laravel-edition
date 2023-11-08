<div id="modal_backdrop" style="display: none;">
    <div class="modal_content">
        <div class="modal_header">
            <div id="modal_title"></div>
            <div class="modal_close">✖</div>
        </div>
        <div class="modal_body">
            <form action="{{ route('createOrder') }}">
                <div class="modal_price">
                    <span class="price_title">Стоимоть:</span> <span id="form_position_price"></span>
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_name">Имя</label>
                    <input type="text" id="input_name" class="modal_input" />
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_phone">Номер телефона</label>
                    <input type="text" id="input_phone" class="modal_input"/>
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_comment">Комментарий</label>
                    <div class="modal_hint">Ваши пожелания, предпочтения или другая уточняющая информация</div>
                    <textarea id="input_comment" rows="5"></textarea>
                </div>
                <button class="modal_confirm">Отправить заявку</button>
            </form>
        </div>
    </div>
</div>
