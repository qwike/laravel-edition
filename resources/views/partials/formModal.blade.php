<div id="modal_backdrop" style="display: none;">
    <div class="modal_content">
        <div class="modal_header">
            <div id="modal_title"></div>
            <div class="modal_close">✖</div>
        </div>
        <div class="modal_body">
            <div class="form_description">@lang('pages.modal_part.description')</div>
            <form action="{{ route('createOrder') }}" id="modalForm" method="POST">
                @csrf
                <div class="modal_price">
                    <span class="price_title">@lang('pages.modal_part.price')</span> <span id="form_position_price"></span>
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_name">@lang('pages.modal_part.input.name')</label>
                    <input type="text" id="input_name" name="name" class="modal_input" required minlength="4" maxlength="255" placeholder="@lang('pages.modal_part.input.name_placeholder')" />
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_phone">@lang('pages.modal_part.input.phone')</label>
                    <input type="text" id="input_phone" class="modal_input" required placeholder="@lang('pages.modal_part.input.phone_placeholder')" />
                </div>
                <div class="modal_input_wrapper">
                    <label for="input_comment">@lang('pages.modal_part.input.comment')</label>
                    <textarea id="input_comment" name="comment" rows="5" maxlength="3000" placeholder="@lang('pages.modal_part.input.comment_placeholder')"></textarea>
                </div>
                <input type="hidden" name="orderable_type" id="form_orderable_type" />
                <input type="hidden" name="orderable_id" id="form_orderable_id" />
                <div style="display: flex; justify-content: center; margin: 15px 0px">
                    {!! Captcha::display() !!}
                </div>
                <button class="modal_confirm">@lang('pages.modal_part.button')</button>
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
