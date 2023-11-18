<div id="load_form">

</div>
<script>
    var formUrl = "{{ route('getForm') }}";
    var positionName = "";
    var positionPrice = "";
    var orderableType = "";
    var orderableId = "";
    $(".orderable").click(function(e){
        e.preventDefault();
        positionName = $(this).data('position-name');
        positionPrice = $(this).data('position-price');
        orderableType = $(this).data('orderable-type');
        orderableId = $(this).data('orderable-id');
        $('#load_form').load(formUrl);
    });
</script>